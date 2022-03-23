<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Css -->
    <link rel="stylesheet" href="./dist/css/style.css">
    <style>
        .loginAndRegisterFormsCard{
            padding: 10px;
            opacity: 1;
            animation-name: loginAndRegisterForms;
            animation-duration: 1s;
        }

        @keyframes loginAndRegisterForms{
            from {opacity: 0; transform: translateY(-2%);}
            to {opacity: 1;}
        }

        .card-title{
            display: flex;
            justify-content: center;
            padding-bottom: 30px;
        }

        .card-title h4{
            font-size: 35px;
        }

        .card-title1{
            color: white;
            animation-name: card-title1;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @keyframes card-title1{
            0% {color: white;}
            50% {color: #00ffff;}
            100% {color: white;}
        }  

        label {
            white-space: pre;
        }

        #emailHelpId, #helpId{
            color: white; 
            font-size: 15px;
        }

        .login{
            color: white;
            background-color: transparent;
            border: 2px solid #00ffff;
            padding: 10px;
        }

        .login:hover{
            color: black;
            background-color: #00ffff;
            transition-duration: 0.4s;
            transform: translateY(5%);
        }

        .d-flex a{
            color: white;
            text-decoration: none;
        }

        .d-flex a:hover{
            color: #00ffff;
        }
    </style>

</head>

<body>

    <div class="loginAndRegisterForms d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-8">
            <form name="login" method="post">
                <div class="transparent-1 text-white">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <!-- username input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="text" class="form-control bg-dark text-white" name="username" id=""
                                aria-describedby="emailHelpId" required>
                            <small id="emailHelpId" class="form-text text-muted">username</small>
                        </div>
                        <!-- password input -->
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <input type="password" class="form-control bg-dark text-white" name="password" id=""
                                aria-describedby="helpId" required>
                            <small id="helpId" class="form-text text-muted">password</small>
                        </div>
                        <!-- alert -->
                        <div class="alert_username alert alert-danger d-none" role="alert">
                            <strong>username or email not found</strong>
                        </div>
                        <div class="alert_password alert alert-danger d-none" role="alert">
                            <strong>password does not match our cresidentials</strong>
                        </div>
                        
                        <!-- submit button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-start gap-4 w-100">
                                <input type="submit" value="login" class="btn btn-primary login">
                                <a class="register" href="/register.php">Register</a>
                                <a href="/forgot_password.php">forgot password?</a>
                            </div>
                            <div class="loader spinner-border text-secondary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/dist/js/jquery.js"></script>
    <script src="/dist/js/auth/login.js"></script>
</body>
</html>