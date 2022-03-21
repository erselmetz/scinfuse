<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../global_function.php';

// get user 
if(isset($_POST['requestToGetUser'])){
    if($_POST['requestToGetUser'] == true){
        if($_POST['token'] == $auth->token()){
            $id = $auth->id();
            $data = [];
            $result = $db->query("SELECT * FROM users WHERE id != '$id' ");
            while($row = $result->fetch_assoc()){
                array_push($data,[
                    "id"=>$row['id'],
                    "name"=>$row['fname'].' '.$row['lname']
                ]);
            }
            echo json_encode($data);
        }
    }
}

// individual chat
if(isset($_POST['retrieveChatBoxIndividual'])){
    if($_POST['retrieveChatBoxIndividual'] == true){
        if($_POST['token'] == $auth->token()){
            
            $to_id = htmlentities($_POST['id']);
            $user_id = $auth->id();

            $sql = "SELECT * FROM chat_individual WHERE from_id='$user_id' AND to_id='$to_id' OR to_id='$user_id' AND from_id='$to_id'";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                $data = [];
                while($row = $result->fetch_assoc()){
                    array_push($data,[
                        "from"=>$row['from_id'],
                        "message"=>$row['message']
                    ]);
                }
                echo json_encode($data);
            }
        }
    }
}

// send message
if(isset($_POST['requestSendIndividualMessage'])){
    if($_POST['requestSendIndividualMessage'] == true){
        if( $_POST['token'] == $auth->token() ){
            $message = htmlentities($_POST['messageText']);
            $to_id = htmlentities($_POST['to_id']);
            $user_id = $auth->id();
            $sql = "INSERT INTO chat_individual (from_id,message,to_id) VALUES ('$user_id','$message','$to_id')";
            if($db->query($sql) === TRUE){
                echo "success";
            }
        }
    }
}

//check the if did exist if not then redirect to individual page
if(isset($_POST['requestToCheckUserId'])){
    if($_POST['requestToCheckUserId'] == true){
        if($_POST['token'] == $auth->token() ){
            
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
}
