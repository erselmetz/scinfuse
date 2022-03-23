<?php

require_once '../vendor/autoload.php';
require_once '../global_function.php';
require_once '../db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['forgotPassword'])){
    if($_POST['forgotPassword'] == true){
        $email = htmlentities($_POST['email']);
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['fname'].' '.$row['lname'];
            $password = $row['password'];
            $username = $row['username'];
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
                $mail->isSMTP();                                          
                $mail->Host       = 'smtp-mail.outlook.com';                  
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'scinfuse@outlook.com';                   
                $mail->Password   = 'infuse2022outlook';                              
                $mail->SMTPSecure = 'tls';           
                $mail->Port       = 587;

                //Recipients
                $mail->setFrom('scinfuse@outlook.com', 'Scinfuse');
                $mail->addAddress($email);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Forgot Password';
                $mail->Body    = "
                <p>Hi,$name</p>
                
                <p>Forgot Password?</p>

                <p>We received  a request to reset your password for your account.</p>   
                
                <p>To reset your password, click on the link below or copy and paste the URL into your browser</p>
                <br>
                <a href='https://scinfuse.com/forgot_password.php?u=$username&p=$password'>https://scinfuse.com/change_password.php?u=$username&p=$password'</a>
                ";

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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