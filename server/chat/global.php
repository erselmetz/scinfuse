<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../global_function.php';


// global chat send message
if(isset($_POST['requestSendGlobalMessage'])){
    $id = $auth->id();
    $from_name = $auth->fullname();
    $message = htmlentities($_POST['messageText']);
    if($globalChat = fopen('globalChatFile.txt','a+')){
        $text = "<a class='text-decoration-none'>$from_name: </a><span>$message</span><br>\n";
        fwrite($globalChat, $text);
        fclose($globalChat);
    }
}

// global chat retrieve message
if(isset($_POST['retrieveChatBoxGlobal'])){
    if($_POST['retrieveChatBoxGlobal'] == true){
        $filename = 'globalChatFile.txt';  
        if($file = fopen($filename,'r')){
            echo fread($file, filesize($filename));
            fclose($file);
        }
    }
}