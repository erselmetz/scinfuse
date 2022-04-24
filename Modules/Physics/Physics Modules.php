<?php

require_once '../../server/auth.php';
require_once '../../server/db.php';
require_once '../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Physics Modules</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>

<body>
    <?php require_once '../../layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Physics Modules</h1>
    </div>

    <div class="modules-row">
        <div class="modules">
            <a href="/Modules/Physics/Materials/Current, Resistance, and Electromotive Force/Current, Resistance, and Electromotive Force.php"><img src="/image/Ohm's Law.jpg"></a>
            <div class="modules-text">
                <h3><b>Current, Resistance, and Electromotive Force</b></h3>
                <a href="/Modules/Physics/Materials/Current, Resistance, and Electromotive Force/Current, Resistance, and Electromotive Force.php" class="button button16">Read</a>
            </div>
            <div class="credits">By: Sigmund F. Breton</div>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../dist/js/Voice Command.js"></script>

    <div class="chat">
        <img src="../../image/Chat icon.png" />
        <div class="chat-content">
            <a href="../../chat/individual.php">Individual</a>
            <a href="../../chat/group.php">Group</a>
            <a href="../../chat/global.php">Global</a>
        </div>
    </div>

    <?php require_once '../../layout/footer.php'; ?>

    <script src="../../dist/js/bootstrap.js"></script>

  </body>
</html>