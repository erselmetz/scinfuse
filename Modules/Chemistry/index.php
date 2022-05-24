<?php

require_once '../../server/auth.php';
require_once '../../server/db.php';
require_once '../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Chemistry Modules</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="..\..\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">

    <?php require_once '../../layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Chemistry Modules</h1>
    </div>
	
	<div class="lecture-modules-row">
        <div class="lecture-modules">
            <a href="../../Modules/Chemistry/Materials/Ideal Gas Law and Dalton’s Law of Partial Pressures/Ideal Gas Law and Dalton’s Law of Partial Pressures.php"><img src="../../Modules/Chemistry/Images/Ideal Gas Law and Dalton’s Law of Partial Pressures.jpg"></a>
            <div class="lecture-modules-text">
                <h3><b>Ideal Gas Law and Dalton’s Law of Partial Pressures</b></h3>
                <a href="../../Modules/Chemistry/Materials/Ideal Gas Law and Dalton’s Law of Partial Pressures/Ideal Gas Law and Dalton’s Law of Partial Pressures.php" class="button button15">Read</a>
            </div>
            <div class="credits">By: Elvira F. Benitez</div>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../Modules/Chemistry/Voice Command.js"></script>

    <?php require_once '../../layout/chat_button.php'; ?>
    <?php require_once '../../layout/footer.php'; ?>
    <?php require_once '../../layout/script.php' ?>

</div>

    <script src="../../dist/js/loader.js"></script>

</body>
</html>