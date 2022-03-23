<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>
<!doctype html>
<html lang="en">

<head>
    <title>Manage Account</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-11 h-75">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="fs-4 fw-bold">Manage your Account</div>
                </div>
            </div>
            <div class="card-body overflow-auto">
                <div class="row h-100">
                    <!-- buttons -->
                    <div class="col-md-3 border-end my-1">
                        <input class="d-flex w-100 btn my-1" type="button" name="btn_s_profile" value="Profile">
                        <input class="d-flex w-100 btn my-1" type="button" name="btn_s_email" value="Email">
                        <input class="d-flex w-100 btn my-1" type="button" id="password" name="btn_s_password"
                            value="Password">
                    </div>
                    <!-- content profile -->
                    <div class="col c_profile d-none">
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header fs-4 fw-bold">Profile</div>
                                <div class="card-body">
                                    <!-- username -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="profile_username" value="<?php echo $auth->username() ?>"
                                            aria-describedby="emailHelpId" autocomplete="off">
                                    </div>
                                    <!-- phone number -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone number</label>
                                        <input type="number" class="form-control" name="profile_phone_number" id=""
                                            aria-describedby="emailHelpId" autocomplete="off">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Update profile">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- content email -->
                    <div class="col c_email d-none">
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header fs-4 fw-bold">Email</div>
                                <div class="card-body">
                                    <!-- email -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $auth->email() ?>"
                                            aria-describedby="emailHelpId" readonly>
                                    </div>
                                    <!-- new email -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">New Email</label>
                                        <input type="text" class="form-control" name="new_email"
                                            aria-describedby="emailHelpId" autocomplete="off">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Update email">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- content password -->
                    <div class="col c_password d-none">
                        <form name="change_password" method="post">
                            <div class="card">
                                <div class="card-header fs-4 fw-bold">Change Password</div>
                                <div class="card-body">
                                    <!-- old password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Old password</label>
                                        <input type="password" class="form-control" name="old_password" id=""
                                            aria-describedby="emailHelpId" autocomplete="off">
                                        <small id="a1" class="form-text text-muted"></small>
                                    </div>
                                    <!-- new password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">New password</label>
                                        <input type="password" class="form-control" name="new_password" id=""
                                            aria-describedby="emailHelpId" autocomplete="off">
                                        <small id="a2" class="form-text text-muted"></small>
                                    </div>
                                    <!-- repeat new password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control" name="repeat_new_password" id=""
                                            aria-describedby="emailHelpId" autocomplete="off">
                                        <small id="a3" class="form-text text-muted"></small>
                                    </div>
                                    <!-- alert -->
                                    <div class="old_password_error alert alert-danger d-none" role="alert">
                                        <strong>you have entered wrong old password !!</strong>
                                    </div>

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
            </div>
        </div>
    </div>

    <script src="/dist/js/bootstrap.js"></script>
    <script src="/dist/js/jquery.js"></script>
    <script src="/dist/js/manage_account.js"></script>
</body>

</html>