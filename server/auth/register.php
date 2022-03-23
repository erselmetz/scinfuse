<?php

session_start();

require_once 'server/db.php';
require_once 'server/global_function.php';

$email_error = '';
$username_error= '';

if(isset($_POST['requestingToRegister'])){
    // get the input text
    $fname = htmlentities($_POST['fname'], ENT_QUOTES);
    $lname = htmlentities($_POST['lname'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $user = htmlentities($_POST['username'], ENT_QUOTES);
    $pass = htmlentities($_POST['password'], ENT_QUOTES);

    // remove spaces
    $fnameTrim = trim($_POST['fname']);
    $lnameTrim = trim($_POST['lname']);
    $emailTrim = trim($_POST['email']);
    $userTrim = trim($_POST['username']);
    $passTrim = trim($_POST['password']);

    // encrypt password
    $encryptPass = password_hash($passTrim, PASSWORD_DEFAULT);

    // check input if not empty
    if( !empty($fnameTrim) && !empty($lnameTrim) && !empty($emailTrim) && !empty($userTrim) && !empty($passTrim) ){
        
        // check if the email is already use
        $sql = "SELECT * FROM users WHERE email='$emailTrim'";
        $email_result = $db->query($sql);
        // check username if already used
        $sql = "SELECT * FROM users WHERE username='$userTrim'";
        $username_result = $db->query($sql);

        if($email_result->num_rows > 0){
            $email_error = 'email is already use!!';
        }else if($username_result->num_rows > 0 ){
            $username_error = 'username is already use!!';
        }else{
            $insertSql = "INSERT INTO users (fname,lname,email,username,password) VALUES ('$fnameTrim','$lnameTrim','$emailTrim','$userTrim','$encryptPass')";
            if($db->query($insertSql) === TRUE){
                $message_success = "Successfuly registered!!";
                header('refresh:0.5 login.php');
            }
        }
    }
    
}