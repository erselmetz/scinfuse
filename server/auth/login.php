<?php

session_start();

require_once '../global_function.php';
require_once '../db.php';

if(isset($_POST['u']) && isset($_POST['p'])){
    $user = htmlentities($_POST['u'], ENT_QUOTES);
    $pass = htmlentities($_POST['p'], ENT_QUOTES);

    $data = [];
    $data['status'] = false;
    $data['email'] = false;
    $data['password'] = false;

    if( !empty(trim($user)) && !empty(trim($pass)) ){

        $sql = "SELECT * FROM users WHERE email='$user' or username='$user' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            // email true
            $data['email'] = true;
            
            $row = $result->fetch_assoc();
            if(password_verify($pass,$row['password'])){
                
                $_SESSION['auth_id'] = $row['id'];
                $_SESSION['auth_fname'] = $row['fname'];
                $_SESSION['auth_lname'] = $row['lname'];
                $_SESSION['auth_fullname'] = $row['fname'].' '.$row['lname'];
                $_SESSION['auth_email'] = $row['email'];
                $_SESSION['auth_username'] = $row['username'];
                $_SESSION['auth_password'] = $row['password'];
                $_SESSION['auth_token'] = randomString(40);
                
                // status and password true
                $data['status'] = true;
                $data['password'] = true;
                // return username and password
                $data['auth_username'] = $row['username'];
                $data['auth_password'] = $row['password'];
            }
        }
        echo json_encode($data);
    }
}