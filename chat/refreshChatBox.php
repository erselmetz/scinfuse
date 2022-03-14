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
                echo "<div class='d-flex justify-content-end bg-danger'>$row[message]</div>";
            }else{
                echo "<div class='d-flex justify-content-start bg-danger'>$row[message]</div>";
            }
        }
    }
}

// group chat
if(isset($_POST['refreshChatBoxGroup'])){
    // $sql = "SELECT * FROM chat_group";
    // $result = $db->query($sql);
    // if($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         return $row['message'];
    //     }
    // }
}

// global chat
if(isset($_POST['refreshChatBoxGlobal'])){
    $sql = "SELECT * FROM chat_global";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['from_name'].': '.$row['message'].'<br>';
        }
    }
}