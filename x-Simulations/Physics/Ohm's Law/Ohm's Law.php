<?php

require_once '../../../server/auth.php';
require_once '../../../server/db.php';
require_once '../../../server/global_function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simulations - Ohm's Law</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="../../../dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="/Simulations/Physics/Materials.css" />
    <script src="p5.js"></script>
    <script src="p5.sound.min.js"></script>
</head>

  <body>
  
  <?php require_once '../../../layout/navbar.php'; ?>

    <div class="ohm">
      <script src="sketch.js"></script>
    </div>

    <div class="chat">
        <img src="../../../image/Chat icon.png" />
        <div class="chat-content">
            <a href="../../../chat/individual.php">Individual</a>
            <a href="../../../chat/group.php">Group</a>
            <a href="../../../chat/global.php">Global</a>
        </div>
    </div>

    <script src="../../../dist/js/bootstrap.js"></script>

</body>

</html>