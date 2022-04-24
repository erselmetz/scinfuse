<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Biology Lectures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Biology Lectures</h1>
    </div>

    <div class="lecture-row">
        <div class="lecture">
            <video controls>
                <source src="/Lectures/Biology/Videos/Cell Structure and Functions.mp4" type="video/mp4">
            </video>
            <div class="lecture-text">
                <h3><b>Cell Structure and Functions</b></h3>
            </div>
        </div>
    </div>

    <?php require_once 'layout/footer.php'; ?>

    <?php require_once 'layout/script.php'; ?>

  </body>
</html>