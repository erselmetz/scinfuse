<?php

require_once '../../server/auth.php';
require_once '../../server/db.php';
require_once '../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Earth Science Modules</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="..\..\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">

    <?php require_once '../../layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Earth Science Modules</h1>
    </div>

    <div class="lecture-modules-row">
        <div class="lecture-modules">
            <a href="../../Modules/Earth Science/Materials/Weathering and Erosion/Weathering and Erosion.php"><img src="../../Modules/Earth Science/Images/River canyon.png"></a>
            <div class="lecture-modules-text">
                <h3><b>Weathering and Erosion</b></h3>
                <a href="../../Modules/Earth Science/Materials/Weathering and Erosion/Weathering and Erosion.php" class="button button13">Read</a>
            </div>
            <div class="credits">By: Dranreb B. Biso</div>
        </div>
        <div class="lecture-modules">
            <a href="../../Modules/Earth Science/Materials/Earth and Earth's Subsystems/Earth and Earth's Subsystems.php"><img src="../../Modules/Earth Science/Images/Earth and Earth's Subsystems.png" style="width: 400px"></a>
            <div class="lecture-modules-text">
                <h3><b>Earth and Earth's Subsystems</b></h3>
                <a href="../../Modules/Earth Science/Materials/Earth and Earth's Subsystems/Earth and Earth's Subsystems.php" class="button button13">Read</a>
            </div>
            <div class="credits">By: Dranreb B. Biso</div>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../Modules/Earth Science/Voice Command.js"></script>

    <?php require_once '../../layout/chat_button.php'; ?>
    <?php require_once '../../layout/footer.php'; ?>
    <?php require_once '../../layout/script.php' ?>

</div>

    <script src="../../dist/js/loader.js"></script>

</body>
</html>