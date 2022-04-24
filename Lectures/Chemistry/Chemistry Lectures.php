<?php

require_once '../../server/auth.php';
require_once '../../server/db.php';
require_once '../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Chemistry Lectures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>

<body>
    <?php require_once '../../layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Chemistry Lectures</h1>
    </div>

    <div class="lecture-row">
        <div class="lecture">
            <video controls>
                <source src="/Lectures/Chemistry/Videos/Batteries.mp4" type="video/mp4">
            </video>
            <div class="lecture-text">
                <h3><b>Batteries</b></h3>
            </div>
            <div class="credits">By: Angelica Irish P. Matira</div>
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