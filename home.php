<?php

require_once './auth.php';
require_once './db.php';

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

    <nav class="navbar navbar-expand-sm navbar-dark bg-transparent-1">
        <div class="container">
            <a class="navbar-brand" href="#">Scinfuse</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle text-dark" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">chat</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./chat/individual.php">individual</a>
                            <a class="dropdown-item" href="./chat/group.php">group</a>
                            <a class="dropdown-item" href="./chat/global.php">global</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle text-dark" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'] ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <!-- <a class="dropdown-item" href="#"></a> -->
                    <a class="dropdown-item" href="./logout.php">logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-8">
            <div class="card-body">
                <h4 class="card-title">User Info</h4>
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?php echo $_SESSION['fname'] ?>" name="" id="" readonly>
                            <small class="form-text text-muted">First Name</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?php echo $_SESSION['lname'] ?>" name="" id="" readonly>
                            <small class="form-text text-muted">Last Name</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" name="" id="" readonly>
                    <small class="form-text text-muted">Email</small>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" value="<?php echo $_SESSION['password'] ?>" name="" id="" readonly>
                    <small class="form-text text-muted">Password</small>
                </div>
                
            </div>
        </div>
    </div>

    <script src="./dist/js/bootstrap.js"></script>
</body>

</html>