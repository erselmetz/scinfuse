<?php

require_once '/server/auth.php';
require_once '/server/db.php';
require_once '/server/globalFunction.php';

?>
<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once '/layout/navbar.php'; ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-8">
            <div class="card-body">
                <h4 class="card-title">User Info</h4>
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?php echo $auth->first_name() ?>" name="" id="" readonly>
                            <small class="form-text text-muted">First Name</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?php echo $auth->last_name() ?>" name="" id="" readonly>
                            <small class="form-text text-muted">Last Name</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" value="<?php echo $auth->email() ?>" name="" id="" readonly>
                    <small class="form-text text-muted">Email</small>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" value="<?php echo $auth->password() ?>" name="" id="" readonly>
                    <small class="form-text text-muted">Password</small>
                </div>
                
            </div>
        </div>
    </div>

    <script src="./dist/js/bootstrap.js"></script>
</body>

</html>