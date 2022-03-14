<?php 

session_start();

require_once './db.php';
$message_error = "";
$message_success = "";

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
                header('refresh:0.4 login.php');
            }
        }
    }  
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Css -->
    <link rel="stylesheet" href="./dist/css/style.css">
    <style>
        .forms{
            background-image: url('../image/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .card{
            background-color: rgba(0,0,0,0.5);
        }
    </style>
  </head>
  <body>

    <div class="forms d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="requestingToRegister">
                <div class="card text-white">
                    <div class="card-body">
                        <h4 class="card-title">Register</h4>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-dark text-white" name="fname" id="">
                                    <small class="form-text text-muted">First Name</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-dark text-white" name="lname" id="">
                                    <small class="form-text text-muted">Last Name</small>
                                </div>
                            </div>
                        </div>
                        <!-- email input -->
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="username" id="" aria-describedby="emailHelpId" placeholder="">
                            <small id="emailHelpId" class="form-text text-muted">email</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <input type="password" class="form-control bg-dark text-white" name="password" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">password</small>
                        </div>
                        <?php 
                            if($message_success != '' || $message_success != null){
                                echo "
                                <div class='alert alert-success' role='alert'>
                                    <strong>$message_success</strong>
                                </div>
                                ";
                            }
                            if($message_error != '' || $message_error != null){
                                echo "
                                <div class='alert alert-danger' role='alert'>
                                    <strong>$message_error</strong>
                                </div>
                                ";
                            }
                        ?>
                        <!-- submit button -->
                        <div class="d-flex align-items-center justify-content-start gap-4">
                            <input type="submit" value="Register" class="btn btn-primary">
                            <a href="./login.php">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
      
  </body>
</html>