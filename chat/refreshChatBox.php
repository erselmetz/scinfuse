<?php

require_once '../auth.php';
require_once '../db.php';

// individual chat
if(isset($_POST['refreshChatBoxIndividual'])){
    $to_id = $_POST['id'];
    $sql = "SELECT * FROM chat_individual WHERE from_id = $_SESSION[user_id] AND to_id = $to_id OR to_id = $_SESSION[user_id] AND from_id = $to_id";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($_SESSION['user_id'] == $row['from_id']){
                echo "
                <div class='d-flex justify-content-end'>
                    <div class='p-1 bg-primary text-white rounded mb-1'>
                        $row[message]    
                    </div>
                </div>";
            }else{
                echo "
                <div class='d-flex justify-content-start'>
                    <div class='p-1 bg-primary text-white rounded mb-1'>
                        $row[message]    
                    </div>
                </div>";
            }
        }
    }
}

// group chat
if(isset($_POST['refreshChatBoxGroup'])){
    $gi = htmlentities($_POST['id']);
    $sql = "SELECT * FROM chat_group_message WHERE group_id=$gi ";
    $groupChat = $db->query($sql);
    if( $groupChat->num_rows > 0 ){
        while ($row = $groupChat->fetch_assoc()) {
            if($_SESSION['user_id'] == $row['member_id']){
                echo "
                <div class='d-flex justify-content-end'>
                    <div class='p-1 bg-primary text-white rounded mb-1'>
                        $row[message]    
                    </div>
                </div>";
            }else{
                $sql="SELECT * FROM users WHERE id=$row[member_id] LIMIT 1";
                $result = $db->query($sql);
                $userinfo = $result->fetch_assoc();
                echo "
                <div class='d-flex justify-content-start'>
                    <div class='p-1 bg-primary text-white rounded mb-1'>
                        $userinfo[fname] : $row[message]     
                    </div>
                </div>";
            }
        }
    }
}

// global chat
if(isset($_POST['refreshChatBoxGlobal'])){
    $filename = '../globalChatFile.txt';  
    if($file = fopen($filename,'r')){
        echo fread($file, filesize($filename));
        fclose($file);
    }
}