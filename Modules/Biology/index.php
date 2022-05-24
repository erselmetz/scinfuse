<?php

require_once '../../server/auth.php';
require_once '../../server/db.php';
require_once '../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Biology Modules</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="..\..\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">

    <?php require_once '../../layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Biology Modules</h1>
    </div>
	
	<div class="lecture-modules-row">
        <div class="lecture-modules">
            <a href="../../Modules/Biology/Materials/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen.php"><img src="../../Modules/Biology/Images/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen.png"></a>
            <div class="lecture-modules-text">
                <h3><b>The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen</b></h3>
                <a href="../../Modules/Biology/Materials/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen.php" class="button button14">Read</a>
            </div>
            <div class="credits">By: Divine Brillantes</div>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../Modules/Biology/Voice Command.js"></script>

    <?php require_once '../../layout/chat_button.php'; ?>
    <?php require_once '../../layout/footer.php'; ?>
    <?php require_once '../../layout/script.php' ?>

</div>

    <script src="../../dist/js/loader.js"></script>

</body>
</html>