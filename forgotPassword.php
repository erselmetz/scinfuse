<?php 

// comming soon
require_once './globalFunction.php';

?>
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
                        <div class="alert alert-warning" role="alert">
                            <strong>Note: under development!</strong>
                        </div>
                        <div class="card-text text-muted user-select-none">
                            Forgot your password? No problem. Just let us know your email address and we will
                            email you a password reset link that allow you to choose a new one.
                        </div>
                        <!-- email input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="text" class="form-control bg-dark text-white" name="username" id=""
                                aria-describedby="emailHelpId" required>
                            <small id="emailHelpId" class="form-text text-muted">email</small>
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
                            <input type="submit" value="EMAIL PASSWORD RESET LINK" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>