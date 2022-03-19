<?php require_once '/server/auth/register.php';?>
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
            background-image: url('/image/background.jpg');
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
                                    <input type="text" class="form-control bg-dark text-white" name="fname" id="" required>
                                    <small class="form-text text-muted">First Name</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-dark text-white" name="lname" id=""required>
                                    <small class="form-text text-muted">Last Name</small>
                                </div>
                            </div>
                        </div>
                        <!-- email input -->
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="username" id="" aria-describedby="emailHelpId" placeholder=""required>
                            <small id="emailHelpId" class="form-text text-muted">email</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <input type="password" class="form-control bg-dark text-white" name="password" id="" aria-describedby="helpId" placeholder=""required>
                            <small id="helpId" class="form-text text-muted">password</small>
                        </div>
                        <?php 
                            message_alert([
                                'success'=>$message_success,
                                'error'=>$message_error
                            ]);
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