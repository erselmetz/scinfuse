<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../global_function.php';

// get user 
if(isset($_POST['requestToGetUser'])){
    if($_POST['requestToGetUser'] == true){
        $id = $auth->id();
        $limit = htmlentities($_POST['limit']);
        $data = [];
        $data['user_list'] = false;
        $data['user'] = [];
        $result = $db->query("SELECT * FROM users WHERE id != '$id' LIMIT $limit");

        if( $result->num_rows > 0 ){
            while ( $row = $result->fetch_assoc() ) {
                $sql = "SELECT * FROM chat_individual WHERE from_id=$id AND to_id=$row[id] OR from_id=$row[id] AND to_id=$id";
                $result = $db->query($sql);
                if( $result->num_rows > 0 ){
                    while($row = $result->fetch_assoc()){ 
                        $sql = "SELECT * FROM users WHERE id=$row[to_id] OR id=$row[from_id] AND id!=$id";
                        $result = $db->query($sql);
                        if($result->num_rows > 0){
                            $data['user_list'] = true;
                            while( $row = $result->fetch_assoc() ){
                                array_push($data['user'],[
                                    "id"=>$row['id'],
                                    "name"=>$row['fname'].' '.$row['lname']
                                ]);
                            }
                        }
                    }
                }
            }
        }

        echo json_encode($data);
    }
}

// get user by using search method 
if(isset($_POST['searchToGetUser'])){
    if($_POST['searchToGetUser'] == true){
        $name = htmlentities($_POST['name']);
        $id = $auth->id();
        $limit = htmlentities($_POST['limit']);
        $data = [];
        if( $name !=null || $name != '' ){
            $sql = "SELECT * FROM users WHERE lname LIKE '%$name%' OR fname LIKE '%$name%' AND id!='$id' LIMIT $limit";
            $result = $db->query($sql);

            if($result->num_rows > 0){
                while( $row = $result->fetch_assoc() ){
                    array_push($data,[
                        "id"=>$row['id'],
                        "name"=>$row['fname'].' '.$row['lname']
                    ]);
                }
            }
        }
        echo json_encode($data);
    }
}

// individual chat
if(isset($_POST['retrieveChatBoxIndividual'])){
    if($_POST['retrieveChatBoxIndividual'] == true){
        $to_id = htmlentities($_POST['id']);
        $user_id = $auth->id();

        $data = [];
        $data['chatAvailable'] = false;
        $data['chatBox'] = [];


        $sql = "SELECT * FROM chat_individual WHERE from_id='$user_id' AND to_id='$to_id' OR to_id='$user_id' AND from_id='$to_id'";
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $data['chatAvailable'] = true;
            while($row = $result->fetch_assoc()){
                array_push($data['chatBox'],[
                    "from"=>$row['from_id'],
                    "message"=>$row['message']
                ]);
            }
        }
        echo json_encode($data);
    }
}

// send message
if(isset($_POST['requestSendIndividualMessage'])){
    if($_POST['requestSendIndividualMessage'] == true){
        $message = htmlentities($_POST['messageText']);
        $to_id = htmlentities($_POST['to_id']);
        $user_id = $auth->id();
        $sql = "INSERT INTO chat_individual (from_id,message,to_id) VALUES ('$user_id','$message','$to_id')";
        if($db->query($sql) === TRUE){
            echo "success";
        }
    }
}

//check the if did exist if not then redirect to individual page
if(isset($_POST['requestToCheckUserId'])){
    if($_POST['requestToCheckUserId'] == true){
        $data = [
            "status"=>'success',
        ];
        $id = htmlentities($_POST['id']);
        $user_id = $auth->id();

        $sqlGetid = "SELECT * FROM users WHERE id='$id' AND id!='$user_id' LIMIT 1";
        $result = $db->query($sqlGetid);
        if($result->num_rows < 1){
            $data['status']= 'error';
        }else{
            $row = $result->fetch_assoc();
            $data['name'] = $row['fname'].' '.$row['lname'];
        }

        echo json_encode($data);
    }
}
