<?php

class Controller{

    public static function login(){
        if(isset($_POST['u']) && isset($_POST['p'])){

            $db = DB::connection();

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
                        
                        Auth::set_id($row['id']);
                        Auth::set_first_name($row['fname']);
                        Auth::set_last_name($row['lname']);
                        Auth::set_fullname($row['fname'].' '.$row['lname']);
                        Auth::set_email($row['email']);
                        Auth::set_phone_number($row['phone_number']);
                        Auth::set_username($row['username']);
                        Auth::set_password($row['password']);
                        Auth::set_token(App::randomString(40));
                        
                        // status and password true
                        $data['status'] = true;
                        $data['password'] = true;
                    }
                }
            }
            echo json_encode($data);
        }
    }

    public static function register(){
        $email_error = '';
        $username_error= '';

        if(isset($_POST['requestingToRegister'])){
            $db = DB::connection();

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
    }

    public static function forgot_password(){
        $db = DB::connection();
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
    }

    public static function logout(){
        if(isset($_POST['requestToLogout'])){
            if($_POST['requestToLogout'] == true){
                session_destroy();
                $data = [];
                $data['login'] = false;
                echo json_encode($data);
            }
        }
    }

    public static function validate(){
        $data = [];
        $data['login'] = false;
        if ( isset($_SESSION['auth_username']) && isset($_SESSION['auth_password']) 
            && isset($_SESSION['auth_token']) && isset($_SESSION['auth_email'])
            && isset($_SESSION['auth_fname']) && isset($_SESSION['auth_lname'])
        ) {
            $data['login'] = true;
        }
        echo json_encode($data);
    }

    
}