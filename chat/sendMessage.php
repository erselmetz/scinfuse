<?php 

require_once '../auth.php';
require_once '../db.php';

// individual chat
if(isset($_POST['requestSendIndividualMessage'])){
    $message = htmlentities($_POST['messageText']);
    $to_id = htmlentities($_POST['to_id']);
    $sql = "INSERT INTO chat_individual (from_id,message,to_id) VALUES ('$_SESSION[user_id]','$message','$to_id')";
    if($db->query($sql) === TRUE){
        echo "success";
    }
}

// group chat
if(isset($_POST['requestSendGroupMessage'])){
    $message = htmlentities($_POST['messageText']);
    $gi = htmlentities($_POST['gi']);
    $sql = "INSERT INTO chat_group_message (group_id,member_id,message) VALUES ('$gi','$_SESSION[user_id]','$message')";
    if($db->query($sql) === TRUE){
        echo "success";
    }
}

// global chat
if(isset($_POST['requestSendGlobalMessage'])){
    $from_name = $_SESSION['user_fullname'];
    $message = htmlentities($_POST['messageText']);
    if($globalChat = fopen('../globalChatFile.txt','a')){
        $text = "<a class='text-decoration-none' href='$_SESSION[user_id]'>$from_name: $message</a><br>\n";
        fwrite($globalChat, $text);
        fclose($globalChat);
    }
}