<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

$subject_name = '';

if(isset($_GET['subject'])){
    $subject_name = htmlentities($_GET['subject']);
    header("location: /Lectures/".$subject_name);
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Lectures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body onload="myFunction()">

<img src="\image\loader.png" width="120" id="loader"/>

<div style="display:none;" id="scinfuse">

    <?php require_once 'layout/navbar.php' ?>

    <div class="welcome-text1">
        <h1>Welcome to Lectures!</h1>
    </div>

    <?php require_once 'layout/subjects.php' ?>

    <button class="button button10 w3-block" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once 'layout/chat_button.php' ?>
    <?php require_once 'layout/footer.php' ?>
    <?php require_once 'layout/script.php' ?>

</div>

    <script src="./dist/js/loader.js"></script>

</body>

</html>