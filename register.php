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

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">
  </head>

  <body>
    <div class="forms d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="requestingToRegister">
                <div class="card" id="register">
                    <div class="card-body">
                        <h4 class="card-title">Register</h4>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-dark text-white" name="fname" id="" required>
                                    <small class="form-text">First Name</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-dark text-white" name="lname" id=""required>
                                    <small class="form-text">Last Name</small>
                                </div>
                            </div>
                        </div>
                        <!-- email input -->
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="email" id="" aria-describedby="emailHelpId" placeholder=""required>
                            <small id="emailHelpId" class="form-text">Email</small>
                        </div>
                        <!-- username input -->
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="username" id="" aria-describedby="emailHelpId" placeholder=""required>
                            <small id="emailHelpId" class="form-text">Username</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <input type="password" class="form-control bg-dark text-white" name="password" id="" aria-describedby="helpId" placeholder=""required>
                            <small id="helpId" class="form-text">Password</small>
                        </div>
                        <?php 
                            message_alert([
                                'success'=>$message_success,
                                'error'=>$email_error,
                            ]);
                            message_alert([
                                'error'=>$username_error
                            ]);
                        ?>
                        <!-- submit button -->
                        <div class="d-flex align-items-center justify-content-start gap-4">
                            <input type="submit" value="Register" class="button btn-register">
                            <a class="login" href="./login.php">Login</a>
							<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?
								sealID=MszYHvZdZGA9NjMImW8W5688dQjmoFOGojZH8bkjMl0F3IfyS07zUn2N40oF"></script></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
      
  </body>

  <style>
        body{
            background-image: url('/image/lagrohigh.jpg'); 
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .btn-register {
            background-color: transparent;
            border: 2px solid #00ffff;
            color: white;
        }

            .btn-register:hover {
                background-color: #00ffff;
                color: black;
                transform: translateY(5%);
            }
    </style>

</html>