<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../global_function.php';

// ==================== global chat send message ====================
if(isset($_POST['requestSendGlobalMessage'])){
    if( $_POST['requestSendGlobalMessage'] == true ){
        $id = $auth->id();
        $name = $auth->fullname();   
        $message = htmlentities($_POST['messageText']);

        // ========== return this data ==========
        $data = [];

        $sql = "INSERT INTO `chat_global`(`from`,`name`, `message`) VALUES ('$id','$name','$message')";
        $result = $db->query($sql);
        if( $result == true ){
            $data['status'] = true;
        }
        echo json_encode($data);
    }
}

// ==================== global chat retrieve message ====================
if(isset($_POST['retrieveChatBoxGlobal'])){
    if($_POST['retrieveChatBoxGlobal'] == true){

        // ========== return this data ==========
        $data = [];

        $sql = "SELECT * FROM chat_global ORDER BY id DESC LIMIT 15";
        $result = $db->query($sql);
        if( $result->num_rows > 0 ){
            while( $row = $result->fetch_assoc() ){
                array_push($data,[
                    'id'=>$row['id'],
                    'user_id'=>$row['from'],
                    'name'=>$row['name'],
                    'message'=>$row['message']
                ]);
            }
        }
        echo json_encode($data);
    }
}