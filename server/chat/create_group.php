<?php

require_once '../server/auth.php';
require_once '../server/db.php';
require_once '../server/global_function.php';

$groupCode = randomString(3).'-'.randomString(4).'-'.randomString(3);

if(isset($_POST['requestToCreateGroup'])){
    if(isset($_POST['groupStatus'])){
        $name = htmlentities($_POST['groupName']);
        $status = htmlentities($_POST['groupStatus']);
        $code = $groupCode;
        $user_id = $auth->id();

        // trim
        $nameTrim = trim($name);
        $statusTrim = trim($status);

        if( !empty($nameTrim)&&!empty($statusTrim) ){
            $sqlGroupChat = "INSERT INTO chat_group (name,status,code,leader) VALUES ('$name','$status','$code','$user_id')";
            if( $db->query($sqlGroupChat) === TRUE ){
                header('location: ./group.php');
            }

        }
    }else{
        $message_error = "select group status";
    }

}

