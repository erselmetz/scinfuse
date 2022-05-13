<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>
<!doctype html>
<html lang="en">

<head>
    <title>Manage Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>
    
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-11 h-75" id="manage">
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
                        <form id="update_profile_form" method="post">
                                <div class="card-header fs-4 fw-bold">Profile</div>
                                <div class="card-body">
                                    <!-- first anme -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="profile_firstname" value="<?php echo $auth->first_name() ?>"
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                    </div>
                                    <!-- last name -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="profile_lastname" value="<?php echo $auth->last_name() ?>"
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                    </div>
                                    
                                    <!-- username -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="profile_username" value="<?php echo $auth->username() ?>"
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                    </div>

                                    <!-- phone number -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone number</label>
                                        <input type="number" class="form-control" name="profile_phone_number" value="<?php echo $auth->phone_number() ?>"
                                            aria-describedby="emailHelpId" autocomplete="off">
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <div class="d-flex align-items-center justify-content-start gap-4">
                                        <input type="submit" class="button btn-manage1" value="Update Profile">
                                        <div class="loader spinner-border text-secondary d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="/icon/check-circle-fill.svg" class="check-fill-up d-none w-100 h-100" alt="">
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- content email -->
                    <div class="col c_email d-none">
                        <form name="new_email" method="post">
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
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <div class="d-flex align-items-center justify-content-start gap-4">
                                        <input type="submit" class="button btn-manage1" value="Update Email">
                                        <div class="loader spinner-border text-secondary d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="/icon/check-circle-fill.svg" class="check-fill-ne d-none w-100 h-100" alt="">
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- content password -->
                    <div class="col c_password d-none">
                        <form name="change_password" method="post">
                                <div class="card-header fs-4 fw-bold">Change Password</div>
                                <div class="card-body">
                                    <!-- old password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Old password</label>
                                        <input type="password" class="form-control" name="old_password" id=""
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                        <small id="a1" class="form-text text-muted"></small>
                                    </div>
                                    <!-- new password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">New password</label>
                                        <input type="password" class="form-control" name="new_password" id=""
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                        <small id="a2" class="form-text text-muted"></small>
                                    </div>
                                    <!-- repeat new password input -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Repeat password</label>
                                        <input type="password" class="form-control" name="repeat_new_password"
                                            aria-describedby="emailHelpId" autocomplete="off" required>
                                        <small id="a3" class="form-text text-muted"></small>
                                    </div>
                                    <!-- alert -->
                                    <div class="old_password_error alert alert-danger d-none" role="alert">
                                        <strong>You have entered old password!</strong>
                                    </div>

                                    <div class="match_error alert alert-danger d-none" role="alert">
                                        <strong>Password should be matched!</strong>
                                    </div>

                                    <div class="alert alert-success alert_success d-none" role="alert">
                                        <strong>You have successfully change your password!</strong>
                                    </div>
                                    <!-- submit button -->
                                    <div class="button d-flex align-items-center justify-content-start gap-4">
                                        <input type="submit" value="Change Password" class="button btn-manage1">
                                        <div class="loader spinner-border text-secondary d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'layout/script.php'; ?>
    <script src="/dist/js/manage_account.js"></script>
</body>

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
</style>

</html>