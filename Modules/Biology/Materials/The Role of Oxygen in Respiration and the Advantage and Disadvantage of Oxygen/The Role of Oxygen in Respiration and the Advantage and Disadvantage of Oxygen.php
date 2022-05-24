<?php

require_once '../../../../server/auth.php';
require_once '../../../../server/db.php';
require_once '../../../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../dist/css/style.css">
    <link rel="stylesheet" href="../../../../Modules/Materials.css">
</head>

<body>
    <?php require_once '../../../../layout/navbar.php'; ?>

    <div class="welcome-text">
        <h1 style="font-size: 40px"><b>The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen</b></h1>
    </div>

    <div class="text">
        <p>
            The exchange of gases between the lungs and the environment aims to supply the body with oxygen and expire carbon dioxide. Oxygen             is an important compound necessary to make energy in the process called cellular respiration. Cellular respiration is the process             wherein cells undergo series of chemical reactions to generate adenosine triphosphate (ATP). Oxygen is an essential component in               this transformation. Food that we eat needs to be simplified into its simplest form, glucose for the cell to utilize. Glucose, a               simple sugar and oxygen are converted into ATP. So what role does oxygen play in this process? Let’s find out.
        </p>

        <p>
            You might recall that in aerobic respiration, glucose reacts with oxygen to form ATP. Oxygen is the final electron acceptor in the             electron transport chain (ETC). It combines with electrons and hydrogen ions producing water. But what if there is no presence of             oxygen? Can ATP be generated without the use of oxygen?
        </p>

        <p>
            In anaerobic respiration, it begins the same way as aerobic respiration wherein the first step is glycolysis, creating 2 ATP from             one carbohydrate molecule. However, in the end after creating the pyruvate molecule, it continues the same path as aerobic                     respiration.
        </p>
		
		<img src="/Modules/Biology/Images/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen.png" width="800" height="500" />

        <p style="margin-top: 20px">
            In this manner, cells can still oxidize organic fuel and generate ATP without the use of oxygen. These are done by prokaryotic                 organisms that live in environments without or little amount of oxygen. They have the electron transport chain but do not make use             of oxygen as the final electron acceptor at the end of the chain. Instead they make use of less electronegative substances such as             sulfate ion (for sulfate reducing bacteria), others makes use of nitrate (NO-3), sulfur or any variety of molecules.
        </p>

        <p>
            Fermentation does not also utilize oxygen. Same as cellular respiration, it also starts with glycolysis with pyruvate as the end               product. However, pyruvate does not continue with oxidation, the citric acid cycle and the ETC. since the ETC is not functional,               the NADH produced in glycolysis, NADH cannot lose its electrons to form NAD+ For this reason, the purpose of fermentation reaction             is to regenerate the electron carrier NAD+ to NADH produced in glycolysis.
        </p>

        <p>
            In Lactic fermentation, NADH transfers its electrons directly to pyruvate producing lactate as a by product. Bacteria present in               yogurt carry out lactic acid fermentation. When lactic acid are produced in muscles, it is transported through the bloodstream and             liver where it is converted to pyruvate or stored in the muscle making it soar.
        </p>
		
		<p>
			The NADH in Alcoholic fermentation donates its electrons producing ethanol as a by product. The first step is the removal of the               carboxyl group from the pyruvate releasing CO2 producing acetaldehyde , a 2 carbon molecule. This is then followed by NADH passing             its electrons to acetaldehyde producing NAD+ forming ethanol.
		</p>
		
		<p>
			Both process have advantage and disadvantages. In aerobic respiration, the process generates more ATP, making it efficient when it             comes to supplying the body with ATP. It generates much more energy in comparison with anaerobic respiration. Without oxygen, the             process cannot continue further to produce ATP. Although it produces more ATP, the reaction is very slow. Anaerobic respiration               allows the survival of organisms in places where there is little or no supply of oxygen. Since it does not require oxygen, the                 reaction is very fast. However, it becomes a disadvantage for it produces less amount of ATP, making it inefficient in terms of               ATP production. It also produces body toxins like lactic acid and ethyl alcohol.
		</p>
		
	<h1 style="font-size: 20px; text-align: left; margin-top: 40px; margin-bottom: 20px"><b>Remember:</b></h1>
		
	<div class="references">
        <ul>
            <li>
                Cellular Respiration is the process wherein glucose is broken down to produce ATP. The process occurs in the mitochondria.
            </li>
            <li>
                It consists of three major stages: Glycolysis, which is the splitting of sugar molecule producing 2 pyruvate molecules. This                   reaction occurs in the cytoplasm. Before proceeding to the next stage, pyruvate is converted into Acetyl CoA. 2 Acetyl CoA                     will enter the mitochondrial membrane for the Krebs cycle where it will undergo a series of reactions producing 6CO2, 8 NADH                   and 2 FADH2 and 2 ATP. The last stage is the Electron Transport Chain, where the 2FADH2 and NADH will be utilized to generate                 32-34 ATPs.
            </li>
            <li>
                Oxygen plays a major role as the electron acceptor in the ETC and in combination with the H+ to form water.
            </li>
            <li>
                Anaerobic respiration does not require oxygen. There are two types : Alcoholic fermentation, where ethanol is produced as a                   by-product, and Lactic acid fermentation , a reaction that produces lactic acid. These two process produce 2 ATP.
            </li>
        </ul>
    </div>
		
	<div class="welcome-text">
        <h1 style="font-size: 20px; text-align: left; font-style: italic"><b>References</b></h1>
    </div>

    <div class="references">
        <ul style="list-style-type:none;">
            <li>
                Simon, Eric.2013. Campbell Essential Biology with Physiology. Pearson Education, Inc. USA
            </li>
            <li>
                Wilson, John Hunt, Tim. 2013. Molecular Biology of the Cell, Fifth Edition. McGraw Hill Publication. USA
            </li>
            <li>
                Mader, Sylvia. 2011.Biology 10th Ed. Mac Graw Hill Education, USA.
            </li>
            <li>
                Becker, W.M. 2000. The World of the Cell. Addison Wesley Longman Inc. USA
            </li>
			<li>
				Campbell, Neil, Reece, Jane. 2007. Biology 7th Edition. Addison Wesley Publishing Company. USA
			</li>
        </ul>
    </div>
		
 </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="../../../../Modules/Biology/Materials/The Role of Oxygen in Respiration and the Advantage and Disadvantage of Oxygen/Voice Command.js"></script>

    <?php require_once '../../../../layout/chat_button.php'; ?>
    <?php require_once '../../../../layout/script.php' ?>

</body>

</html>