<!doctype html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Css -->
    <link rel="stylesheet" href="/dist/css/style.css">

    <!-- email js -->
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script>
    (function(){
        emailjs.init("Ogol3dyQOWAL59JpF");
    })();
    </script>

</head>

<body>

    <div class="forgot_password d-none d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form name="forgot_password" method="post">
                <div class="loginAndRegisterFormsCards transparent-1 text-white">
                    <div class=" card-body">
                        <div class="card-text text-muted user-select-none">
                            Forgot your password? No problem. Just let us know your email address and we will
                            email you a password reset link that allow you to choose a new one.
                        </div>
                        <!-- email input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="text" class="form-control bg-dark text-white" name="email"
                                aria-describedby="emailHelpId" required>
                            <small id="emailResponse" class="form-text text-muted"></small>
                        </div>
                        <!-- alert -->
                        
                        <!-- submit button -->
                        <div class="d-flex align-items-center justify-content-start gap-4">
                            <input type="submit" value="SEND EMAIL PASSWORD RESET LINK" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- if u and p is exist -->
    <div class="enter_new_password d-none d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form name="change_password" method="post">
                <div class="transparent-1 text-white">
                    <div class="card-body">
                        <!-- new password input -->
                        <div class="mb-3">
                            <label for="" class="form-label">New password</label>
                            <input type="password" class="form-control bg-dark text-white" name="new_password"
                                aria-describedby="emailHelpId" required autocomplete="off">
                            <small id="a2" class="form-text text-muted"></small>
                        </div>
                        <!-- repeat new password input -->
                        <div class="mb-3">
                            <label for="" class="form-label">Repeat new password</label>
                            <input type="password" class="form-control bg-dark text-white" name="repeat_new_password"
                                aria-describedby="emailHelpId" required autocomplete="off">
                            <small id="a3" class="form-text text-muted"></small>
                        </div>
                        <!-- alert -->
                        <div class="match_error alert alert-danger d-none" role="alert">
                            <strong>password should be match !!</strong>
                        </div>

                        <div class="alert alert-success alert_success d-none" role="alert">
                            <strong>you have successfully change your password</strong>
                        </div>
                        
                        <!-- submit button -->
                        <div class="button d-flex align-items-center justify-content-start gap-4">
                            <input type="submit" value="CHANGE PASSWORD" class="btn btn-primary">
                            <div class="loader spinner-border text-secondary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require_once 'layout/script.php'; ?>
    <script src="/dist/js/auth/forgot_password.js"></script>
</body>

</html>