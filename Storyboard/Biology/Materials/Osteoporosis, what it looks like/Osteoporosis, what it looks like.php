<?php

require_once '../../../../server/auth.php';
require_once '../../../../server/db.php';
require_once '../../../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Osteoporosis, what it looks like?</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../dist/css/style.css">
    <link rel="stylesheet" href="../../../../Modules/Materials.css">
</head>

<body>
    <?php require_once '../../../../layout/navbar.php'; ?>
	
	<img src="../../../../Storyboard/Biology/Images/Osteoporosis1.png" style="width: 100%"/>
	
	<a href="../../../../Storyboard/Biology/Materials/Osteoporosis, what it looks like/Osteoporosis, what it looks like1.php">
		<button class="button button10" style="position: fixed; right: 100px; bottom: 0; width: 100px">
        	Next
    	</button>
	</a>

    <button class="button button10" id="btn" onclick='recognition.start()' style="position: fixed; left: 0; bottom: 0">
        <img src="../../../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../../../Storyboard/Biology/Materials/Osteoporosis, what it looks like/Voice Command.js"></script>

    <?php require_once '../../../../layout/chat_button.php'; ?>
    <?php require_once '../../../../layout/script.php' ?>

</body>

</html>