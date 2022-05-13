<?php

session_start();

require_once '../server/db.php';

$email_wrong = false;
$password_wrong = false;

if(isset($_SESSION['admin_login'])){
    if($_SESSION['admin_login'] == true){
        header("location: /admin/dashboard.php");
    }
}

if(isset($_POST['login_admin'])){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    
    if ( $username != null && $password != null ) {
        $sql="SELECT * FROM admin WHERE username='$username' OR email='$username' LIMIT 1";
        $result = $db->query($sql);
        $userInfo = $result->fetch_assoc();
        if($result->num_rows > 0){
            $password_verify = password_verify($password,$userInfo['password']);
            if($password_verify == true){
                $_SESSION['admin_login'] = true;
                $_SESSION['admin_id'] = $userInfo['id'];
                $_SESSION['admin_username'] = $userInfo['username'];
                $_SESSION['admin_password'] = $userInfo['password'];
                $_SESSION['admin_email'] = $userInfo['email'];
                header('location: ./dashboard.php');
            }else{$password_wrong = true;}
        }else{$email_wrong = true;}
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scinfuse | Admin </title>
    <!-- style -->
    <?php require_once './layout/style.php'; ?>
</head>

<body>

    <div class="center">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="w3-container w3-card-4 w3-display-bottom w3-col s8 w3-mobile w3-padding-16">
            <input type="hidden" name="login_admin">
            <input class="w3-input" name="username" type="text" required>
            <label>Username</label>
            <input class="w3-input" name="password" type="password" required>
            <label>Password</label>
            <button class="w3-block w3-button w3-section w3-teal w3-ripple"> Log in </button>
            <?php
            if($email_wrong){
                echo "<div class='w3-panel w3-red'>
                <p>Email or username is incorrect</p>
              </div> ";
            }
            if($password_wrong == true){
                echo "<div class='w3-panel w3-red'>
                <p>Password is incorrect</p>
              </div> "; 
            }
        ?>
        </form>
    </div>

</body>

</html>