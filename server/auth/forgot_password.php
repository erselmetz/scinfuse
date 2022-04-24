<?php

require_once '../global_function.php';
require_once '../db.php';

if(isset($_POST['forgotPassword'])){
    if($_POST['forgotPassword'] == true){
        $email = htmlentities($_POST['email']);
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            $name = $row['fname'].' '.$row['lname'];
            $username = $row['username'];
            $password = $row['password'];

            // return data
            $data = [];
            $data['name'] = $name;
            $data['username'] = $username;
            $data['password'] = $password;
            $data['email_to'] = htmlentities($_POST['email']);

            echo json_encode($data);
        }
    }
}

// check u and p if true
if(isset($_POST['uAndPparameter'])){
    if($_POST['uAndPparameter'] == true){
        $u = htmlentities($_POST['u']);
        $p = htmlentities($_POST['p']);

        $data = [];

        // check u and p parameter
        $sql = "SELECT * FROM users WHERE email='$u' or username='$u' AND password='$p' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        echo json_encode($data);
    }
}

// change password is submited
if(isset($_POST['change_password_from_forgot_password'])){
    if($_POST['change_password_from_forgot_password'] == true){

        $u = htmlentities($_POST['u']);
        $p = htmlentities($_POST['p']);
        $new = htmlentities($_POST['new_password']);
        $repeat_new = htmlentities($_POST['repeat_new_password']);

        $data = [];
        $data['status'] = false;
        $data['new_password'] = $new;
        $data['repeat_new_password'] = $repeat_new;

        if($new == $repeat_new){
            // code here
            $password_hash = password_hash($new, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$password_hash' WHERE email='$u' or username='$u' LIMIT 1";
            if($db->query($sql) == true ){
                $data['status'] = true;
                session_start();
                session_destroy();
            }
        }

        echo json_encode($data);
    }
}