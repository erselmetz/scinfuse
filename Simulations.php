<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Simulations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">
    
<nav class="navbar navbar-expand-sm navbar-dark position-fixed w-100">
    <div class="container">
        <a class="navbar-brand" href="/home.php">
            <img src="\image\SCinFuse.png" width="90"/>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <a href="#EarthScience">
                    <li class="button button3">Earth Science</li>
                </a>
                <a href="#Biology">
                    <li class="button button2">Biology</li>
                </a>
                <a href="#Chemistry">
                    <li class="button button4">Chemistry</li>
                </a>
                <a href="#Physics">
                    <li class="button button1">Physics</li>
                </a>
            </ul>
            <div class="navbar-nav dropdown">
                <a class="nav-link" style="color: white" id="hello">
                    Hello!
                </a>
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $auth->fullname() ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/manage_account.php">Manage Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout.php">Logout</a>
                </div>
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId1">
                    <a class="dropdown-item" href="/manage_account.php">Manage Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

    <section id="EarthScience">
        <div class="welcome-text1">
            <h1><b>Earth Science</b></h1>
        </div>
        <p></p>
    </section>
    <section id="Biology">
        <div class="welcome-text1">
            <h1 style="color:black"><b>Biology</b></h1>
        </div>
        <div class="simulation">
            <a href="/Simulations/Biology/Bone/Bone.php"><img src="Simulations/Biology/Images/Bone.jpg"></a>
            <div class="simulation-text">
                 <h3><b>Long Bone</b></h3>
            </div>
            <div class="credits">By: Beverly Frances T. Velasco</div>
        </div>
    </section>
    <section id="Chemistry">
        <div class="welcome-text1">
            <h1 style="color:black"><b>Chemistry</b></h1>
        </div>
        <p></p>
    </section>
    <section id="Physics">
        <div class="welcome-text1">
            <h1><b>Physics</b></h1>
        </div>
            <div class="simulation">
                <a href="/Simulations/Physics/Ohm's Law/Ohm's Law.php"><img src="Simulations/Physics/Images/Ohm's Law.jpg"></a>
                <div class="simulation-text">
                    <h3><b>Ohm's Law</b></h3>
                </div>
                <div class="credits">By: Sigmund F. Breton</div>
            </div>
    </section>

    <?php require_once 'layout/chat_button.php'; ?>
    <?php require_once 'layout/script.php'; ?>

</div>

    <script src="./dist/js/loader.js"></script>
    
</body>

</html>