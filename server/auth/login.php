<?php

session_start();

require_once '/server/db.php';
require_once '/server/globalFunction.php';

if(isset($_POST['username']) && isset($_POST['password'])){
    $user = htmlentities($_POST['username'], ENT_QUOTES);
    $pass = htmlentities($_POST['password'], ENT_QUOTES);

    if( !empty(trim($user)) && !empty(trim($pass)) ){
        $sql = "SELECT * FROM users WHERE email='$user' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(password_verify($pass,$row['password'])){
                $message_success = "Successfuly login";
                $_SESSION['auth_id'] = $row['id'];
                $_SESSION['auth_fname'] = $row['fname'];
                $_SESSION['auth_lname'] = $row['lname'];
                $_SESSION['auth_fullname'] = $row['fname'].' '.$row['lname'];
                $_SESSION['auth_email'] = $row['email'];
                $_SESSION['auth_username'] = $row['email'];
                $_SESSION['auth_password'] = $row['password'];
                header('location: /home.php');
            }else{
                $message_error = "password does not match our cresidentials";
            }
            
        }else{
            $message_error = "email not found";
        }
    }  
    
}