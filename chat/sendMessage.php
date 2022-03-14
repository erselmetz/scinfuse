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
if(isset($_POST['refreshChatBoxGroup'])){
  
}

// global chat
if(isset($_POST['requestSendGlobalMessage'])){
    $from_name = $_SESSION['fname'].' '.$_SESSION['lname'];
    $message = htmlentities($_POST['messageText']);
    $sql = "INSERT INTO chat_global (from_id,from_name,message) VALUES ('$_SESSION[user_id]','$from_name','$message')";
    if($db->query($sql) === TRUE ){
        echo 'success';
    }
}