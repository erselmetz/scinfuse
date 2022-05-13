<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Storyboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Welcome to Storyboard!</h1>
    </div>

    <?php if(true) { ?>

    <?php } ?>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once 'layout/chat_button.php'; ?>

    <?php require_once 'layout/footer.php'; ?>

    <?php require_once 'layout/script.php'; ?>
    
</body>

</html>

<!-- <div class="story">
    <div class="story-img-right">
        <img src="/image/The Living Legacy.jpg"/>
    </div>
    <div class="story-text">
        <h1>A Living Legacy</h1>
        <p>Explore the nature of weathering and erosion.</p>
        <a class="button button11" href="~/A Living Legacy.html">Start now</a>
    </div>
</div>

<div class="story">
    <div class="story-img-left">
        <img src="/image/Lab.jpg"/>
    </div>
    <div class="story-text">
        <h1>Experiment Time!</h1>
        <p>Deepen your understanding of voltage, current, and resistance with this story of experiment.</p>
        <a class="button button12" href="./A Living Legacy.html">Start now</a>
    </div>
</div> -->