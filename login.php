<?php require_once '/server/auth/login.php';?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Css -->
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>

    <div class="loginAndRegisterForms d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="loginAndRegisterFormsCard text-white">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <!-- email input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="text" class="form-control bg-dark text-white" name="username" id=""
                                aria-describedby="emailHelpId" required>
                            <small id="emailHelpId" class="form-text text-muted">email</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="password" class="form-control bg-dark text-white" name="password" id=""
                                aria-describedby="helpId" required>
                            <small id="helpId" class="form-text text-muted">password</small>
                        </div>
                        <!-- alert -->
                        <?php 
                            message_alert([
                                'success'=>$message_success,
                                'error'=>$message_error
                            ]);
                        ?>
                        <!-- submit button -->
                        <div class="d-flex align-items-center justify-content-start gap-4">
                            <input type="submit" value="login" class="btn btn-primary">
                            <a href="/register.php">Register</a>
                            <a href="/forgotPassword.php">forgot password?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>