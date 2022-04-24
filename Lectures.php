<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Lectures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Welcome to Lectures!</h1>
    </div>

    <div class="lecture-row">
        <div class="lecture">
            <img src="/image/Earth logo.png">
            <div class="lecture-text">
                <h3><b>Earth Science</b></h3>
                <a class="button button13" href="/Lectures/Earth Science/Earth Science Lectures.php">Explore now</a>
            </div>
        </div>

        <div class="lecture">
            <img src="/image/Biology logo.png">
            <div class="lecture-text">
                <h3><b>Biology</b></h3>
                <a class="button button14" href="/Lectures/Biology/Biology Lectures.php">Explore now</a>
            </div>
        </div>

        <div class="lecture">
            <img src="/image/Chemistry logo.png">
            <div class="lecture-text">
                <h3><b>Chemistry</b></h3>
                <a class="button button15" href="/Lectures/Chemistry/Chemistry Lectures.php">Explore now</a>
            </div>
        </div>

        <div class="lecture">
            <img src="/image/Physics logo.png">
            <div class="lecture-text">
                <h3><b>Physics</b></h3>
                <a class="button button16" href="/Lectures/Physics/Physics Lectures.php">Explore now</a>
            </div>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once 'layout/chat_button.php'; ?>

    <?php require_once 'layout/footer.php'; ?>

    <?php require_once 'layout/script.php'; ?>

</body>

</html>