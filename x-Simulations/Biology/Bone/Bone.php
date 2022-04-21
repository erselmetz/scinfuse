<?php

require_once '../../../server/auth.php';
require_once '../../../server/db.php';
require_once '../../../server/global_function.php';

?>

<!doctype html>
<html lang="en-US" dir="ltr">
<head>
	<title>Simulations - Long Bone</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="stylesheet" type="text/css" href="player/rlplayer.css" />
	<link rel="stylesheet" href="../../../dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="/Simulations/Biology/Materials.css" />
	<script type="text/javascript" src="player/rlplayer.js"></script>
	<script type="text/javascript" src="player/rlplayer.lang.en-US.js"></script>
</head>

<body>

<?php require_once '../../../layout/navbar.php'; ?>

	<div id="o6jmHL7i" class="ap-prez-container" lang="en-US" dir="ltr">
		<script type="text/javascript">
			AtomiAP.open("rlprez.js", "o6jmHL7i", {
				playMode: "Test",
				preloader: {zIndex: 1,diameter: 60,density: 9,range: 1000,speed: 1,color:'#2090E6',shape:'oval'}
			});
		</script>
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
