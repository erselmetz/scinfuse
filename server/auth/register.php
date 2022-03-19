<?php

session_start();

require_once '/server/db.php';
require_once '/server/globalFunction.php';

if(isset($_POST['requestingToRegister'])){
    // get the input text
    $fname = htmlentities($_POST['fname'], ENT_QUOTES);
    $lname = htmlentities($_POST['lname'], ENT_QUOTES);
    $user = htmlentities($_POST['username'], ENT_QUOTES);
    $pass = htmlentities($_POST['password'], ENT_QUOTES);

    // remove spaces
    $fnameTrim = trim($_POST['fname']);
    $lnameTrim = trim($_POST['lname']);
    $userTrim = trim($_POST['username']);
    $passTrim = trim($_POST['password']);

    // encrypt password
    $encryptPass = password_hash($passTrim, PASSWORD_DEFAULT);

    // check input if not empty
    if( !empty($fnameTrim) && !empty($lnameTrim) && !empty($userTrim) && !empty($passTrim) ){
        
        // check if the email is already use
        $getSql = "SELECT * FROM users WHERE email='$userTrim'";
        $usersResult = $db->query($getSql);
        if($usersResult->num_rows > 0){
            $message_error = 'email is already use!!';
        }else{
            $insertSql = "INSERT INTO users (fname,lname,email,password) VALUES ('$fnameTrim','$lnameTrim','$userTrim','$encryptPass')";
            if($db->query($insertSql) === TRUE){
                $message_success = "Successfuly registered!!";
                header('refresh:0.5 login.php');
            }
        }
    }  
    
}