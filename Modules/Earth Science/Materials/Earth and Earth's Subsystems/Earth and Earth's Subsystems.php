<?php

require_once '../../../../server/auth.php';
require_once '../../../../server/db.php';
require_once '../../../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Earth and Earth's Subsystems</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../dist/css/style.css">
    <link rel="stylesheet" href="../../../../Modules/Materials.css">
</head>

<body>
    <?php require_once '../../../../layout/navbar.php'; ?>

    <div class="welcome-text">
        <h1 style="font-size: 40px"><b>Earth and Earth's Subsystems</b></h1>
    </div>

    <div class="text">
		
		<h1 style="font-size: 30px; text-align: left; margin-top: 40px; margin-bottom: 20px"><b>Earth</b></h1>
		
        <p>
            We are living on a planet that can support life. Sun is the main source of our energy and all other living organisms. 
            Aside from this, the requirements that are necessary in supporting life on Earth includes the presence of liquid water 
            that covers 74% of the earth's surface just enough because the Earth is located in the habitable zone or Goldilocks zone. 
            When we say Goldilocks, the planet like earth is at the right distance from the sun. Due to the presence of water, it is 
            referred to as home to millions of species of plants and animals including humans. The heat coming from the sun, which is 
            mostly trapped in the atmosphere creates heat needed by living organisms on Earth. The atmosphere also contains gases 
            such as nitrogen, oxygen and others which are vital for us.
        </p>

        <p>
            Read the following article below about our planet Earth:
        </p>

        <p style="text-align: center; font-style: italic">
            Earth is so hospitable to life - we would never have evolved enough to wonder about it if it weren't, but to look 
            at all the things that have come together in just the perfect way to support plants and animals. Earth, like gravity 
            that is close enough to their star to be warm, but not hot that may have liquid water. It's not just about air but 
            also the distance from the sun. What is the importance of the ozone layer? The ozone layer serves as a cover that 
            protects earth from harmful radiation from the sun. The atmosphere is the blanket of air that surrounds the earth. 
            It has oxygen and other gases that shield animals and plants from harmful radiation. The magnetic field of the 
            ecosystem is blessed with a strong and tied up feature of nature. Are you amazed with the variety of food sources in 
            our environment that make our planet stable and sustain life?
        </p>
		
		<h1 style="font-size: 30px; text-align: left; margin-top: 40px; margin-bottom: 20px"><b>Earth's Subsystems</b></h1>

        <p>
            Understanding our planet that we call home seems to be amazing. Scientists break down Earth's system into a number 
            of subsystems namely the atmosphere (air), biosphere (living things), geosphere or lithosphere (land) and hydrosphere 
            (water). It is important to know that subsystems do not work in isolation because one depends on and interacts with 
            the other three. The lithosphere consists of the ground formations where we walk on - the core, the mantle and the 
            crust. It is where mountains and volcanoes formed. The biosphere consists of everything from microorganisms to human 
            beings. It covers all ecosystems from the soil in the rain forest, from mangroves to coral reefs. The hydrosphere is 
            the layer of the Earth which contains water. About 70% of the Earth is water. The atmosphere is made up of different 
            types of gases such as the oxygen, nitrogen, carbon dioxide and other mixture of gases that are responsible for 
            chemical functions.
        </p>

        <p>
            Subsystems interact with each other like the weather happens in the atmosphere. Without hydrosphere, there could be 
            no water to evaporate, or no cloud or rain could form. Without oceans (hydrosphere) and land (geosphere), there would 
            be no wind, as winds are produced by differences of air temperature between the land and the oceans.
        </p>

        <p>
            Remember that the environment of the Earth contains four (4) layers called the subsystem. These are (1) atmosphere 
            that serves us a blanket of gases that protects the Earth's environment from dangerous UV rays (2) lithosphere is the 
            layer of Earth which contains the land (3) hydrosphere is the layer of the Earth which contains the water (4) 
            biosphere is the layer of the Earth which consists of all the living things. These subsystems are interrelated to 
            each other. These subsystems interact with each other, and they work together to influence the climate, trigger 
            geological processes, and affect life all over the Earth.
        </p>

    <div class="welcome-text">
        <h1 style="font-size: 20px; text-align: left; font-style: italic"><b>References</b></h1>
    </div>

    <div class="references">
        <ul style="list-style-type:none;">
            <li>
                Ramos, Anna Cherylle, et al (2018). Exploring Life Through Science Series. Earth and life Science.  
                Quezon City: Phoenix Publishing House Inc.
            </li>
            <li>
                Rodulfo, Raymond S. (2018). Exploring life Through Science Series. Earth Science. Quezon Ctiy: 
                Phoenix Publishing House Inc.
            </li>
            <li>
                Lutgens, F. K., & Tarbuck, E. J. (2012). Essentials of geology. 11th ed. Boston: Prentice Hal
                Skinner, Brian J. The Dynamic Earth: An introduction to Physical Geology. 4th edition. New York : 
                John Wiley & Sons,C2000
            </li>
            <li>
                Ramos, John Donnie et.al Exploring Life Through Science. Phoenix Publishing House. Quezon City 2016
            </li>
        </ul>
    </div>
  </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../../../Modules/Earth Science/Materials/Earth and Earth's Subsystems/Voice Command.js"></script>

    <?php require_once '../../../../layout/chat_button.php'; ?>
    <?php require_once '../../../../layout/script.php' ?>

</body>

</html>