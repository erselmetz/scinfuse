<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">
</head>

<body>
    <div class="loginAndRegisterForms d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form name="login" method="post">
                <div class="transparent-1" id="login">
                    <div class="card-body">
                        <h4 class="card-title">Welcome to SCinFuse!</h4>
                        <!-- username input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="text" class="form-control bg-dark text-white" name="username"
                                aria-describedby="emailHelpId" required>
                            <small id="emailHelpId">Username</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="password" class="form-control bg-dark text-white" name="password"
                                aria-describedby="helpId" required>
                            <small id="helpId">Password</small>
                        </div>
                        <!-- alert -->
                        <div class="alert_username alert alert-danger d-none" role="alert">
                            <strong>Username or email not found</strong>
                        </div>
                        <div class="alert_password alert alert-danger d-none" role="alert">
                            <strong>Password does not match</strong>
                        </div>
                        <!-- submit button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-start gap-4 w-100">
                                <input type="submit" value="Login" class="button btn-login">
                                <a class="register" href="/register.php">Register</a>
                                <a href="/forgot_password.php">Forgot password?</a>
                            </div>
							<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?
								sealID=MszYHvZdZGA9NjMImW8W5688dQjmoFOGojZH8bkjMl0F3IfyS07zUn2N40oF"></script></span>
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
    <script src="/dist/js/auth/login.js"></script>

    <style>
        body{
            background-image: url('/image/login.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;
        }

        @media screen and (max-width: 392px) {

            body{
            background-image: url('/image/login1.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;

            }
        
        }

        .btn-login {
            background-color: transparent;
            border: 2px solid #00ffff;
            color: white;
        }

            .btn-login:hover {
                background-color: #00ffff;
                color: black;
                transform: translateY(5%);
            }
    </style>

</body>
</html>