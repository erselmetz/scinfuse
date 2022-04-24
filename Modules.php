<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Modules</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Welcome to Modules!</h1>
    </div>

    <div class="modules-row">
        <div class="modules">
            <img src="image/Earth logo.png">
            <div class="modules-text">
                <h3><b>Earth Science</b></h3>
                <a class="button button13" href="/Modules/Earth Science/Earth Science Modules.php">Explore now</a>
            </div>
        </div>

        <div class="modules">
            <img src="/image/Biology logo.png">
            <div class="modules-text">
                <h3><b>Biology</b></h3>
                <a class="button button14" href="/Modules/Biology/Biology Modules.php">Explore now</a>
            </div>
        </div>

        <div class="modules">
            <img src="/image/Chemistry logo.png">
            <div class="modules-text">
                <h3><b>Chemistry</b></h3>
                <a class="button button15" href="/Modules/Chemistry/Chemistry Modules.php">Explore now</a>
            </div>
        </div>

        <div class="modules">
            <img src="/image/Physics logo.png">
            <div class="modules-text">
                <h3><b>Physics</b></h3>
                <a class="button button16" href="/Modules/Physics/Physics Modules.php">Explore now</a>
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