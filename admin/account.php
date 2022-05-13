<?php

require_once 'admin.check.php';
require_once '../server/db.php';

$id = $_SESSION['admin_id'];

if(isset($_POST['update_account'])){
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);

    if($username != null || $email != null){
        $sql = "UPDATE admin SET username='$username', email='$email' WHERE id='$id' ";
        if($db->query($sql) == true){
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_email'] = $email;
            echo "<script>alert('Successfuly Changes!!');</script>";
        }
    }
}

if(isset($_POST['update_password'])){
    $password = htmlentities($_POST['password']);
    $new_password = htmlentities($_POST['new_password']);
    $new_password_hash = password_hash($new_password,PASSWORD_DEFAULT);

    if($password != null && $new_password != null){
        $password_verify = password_verify($password, $_SESSION['admin_password']);
        if($password_verify == true){
            $sql = "UPDATE admin SET password='$new_password_hash' WHERE id=$id";
            if($db->query($sql) == true){
                $_SESSION['admin_password'] = $new_password_hash;
                echo "<script>alert('Successfuly Changes!!');</script>";
            } 
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Account</title>
    <?php require_once './layout/style.php'; ?>
</head>

<body>

    <?php
        require_once './layout/navbar.php';
        require_once './layout/sidebar.php';
    ?>

    <div class="w3-main" style="margin-left: 250px;">
        <div class="w3-container w3-padding-64">
            <div class="w3-bar w3-theme-l5">
                <h1 class="w3-bar-item">Admin Account</h1>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="w3-container w3-card w3-margin w3-padding-16">
                    <input type="hidden" name="update_account">
                    <label for="">Username</label>
                    <input type="text" class="w3-input" name="username" 
                        value="<?php echo $_SESSION['admin_username'] ?>">
                    <label for="">Email</label>
                    <input type="text" class="w3-input" name="email" 
                        value="<?php echo $_SESSION['admin_email'] ?>">
                    <button type="submit" class="w3-button w3-blue w3-margin-top">Save Changes</button>
                </div>
            </form>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="w3-container w3-card w3-margin w3-padding-16">
                    <input type="hidden" name="update_password">
                    <label for="">Password</label>
                    <input type="text" class="w3-input" name="password">
                    <label for="">New Password</label>
                    <input type="text" class="w3-input" name="new_password">
                    <button type="submit" class="w3-button w3-blue w3-margin-top">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once './layout/script.php'; ?>
</body>

</html>