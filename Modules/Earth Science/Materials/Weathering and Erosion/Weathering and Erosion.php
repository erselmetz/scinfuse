<?php

require_once '../../../../server/auth.php';
require_once '../../../../server/db.php';
require_once '../../../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Weathering and Erosion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../dist/css/style.css">
    <link rel="stylesheet" href="../../../../Modules/Materials.css">
</head>

<body>
    <?php require_once '../../../../layout/navbar.php'; ?>

    <div class="welcome-text">
        <h1 style="font-size: 40px"><b>Weathering and Erosion</b></h1>
    </div>
    <div class="text">
        <p>
            When rocks and minerals break down into pieces or dissolve, it is called weathering. Weathering happens not just on its own.
            This is possible through the following agents: water, ice, acids, salts, plants, animals, and changes in temperature.
            The more exposed the rock is to weathering, the more it becomes very vulnerable to breaking. For example, rocks buried beneath the
            surface are less vulnerable than those rocks on the surface areas because they are very exposed to agents like wind and water.
        </p>

        <p>
            Once rocks have been broken down into tiny pieces, a process called erosion transports them away into different areas.
            The process of weathering and erosion is responsible for the creation of some famous landmarks around the world like the Delicate
            Arch in Utah and Kapurpurawan Rock Formations in Ilocos Norte, Philippines.
        </p>

        <p>One of the most natural creation resulted from erosion is the canyon or a deep, narrow channel with steep sides.</p>

        <p>
            A river canyon is made when the pressure from a river cuts deep into the river bed. The sediments then from the river bed were carried
            downstream (erosion) which resulted to the creation of canyons. The river that lies down at the bottom of the canyon is called entrenched
            river. What makes it different from other rivers is that the river from canyons do not change its course.
        </p>

        <p>
            For thousands of years weathering and erosion gradually and constantly change the landscape of Earth. Hence, no matter how hard the rock
            is it cannot resist the forces of nature-weathering and erosion.
        </p>

        <img src="/Modules/Earth Science/Images/River canyon.png" width="800" height="500" />
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../../../Modules/Earth Science/Materials/Weathering and Erosion/Voice Command.js"></script>

    <?php require_once '../../../../layout/chat_button.php'; ?>
    <?php require_once '../../../../layout/script.php' ?>

</body>

</html>