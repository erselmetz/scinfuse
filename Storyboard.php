<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Stories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">

    <?php require_once 'layout/navbar.php'; ?>

    <div class="welcome-text1">
        <h1>Welcome to Stories!</h1>
    </div>
	
<div class="story">
    <div class="story-img-right">
        <img src="Storyboard/Biology/Images/Osteoporosis.png"/>
    </div>
    <div class="story-text">
        <h1>Osteoporosis, what it looks like?</h1>
        <p>Have an introduction about bones.</p>
        <a class="button button11" href="Storyboard/Biology/Materials/Osteoporosis, what it looks like/Osteoporosis, what it looks like.php">Start now</a>
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
</div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once 'layout/chat_button.php'; ?>
    <?php require_once 'layout/footer.php'; ?>
    <?php require_once 'layout/script.php'; ?>

</div>

    <script src="./dist/js/loader.js"></script>
    
</body>

</html>