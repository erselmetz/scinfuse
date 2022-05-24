<?php

require_once '../../../../server/auth.php';
require_once '../../../../server/db.php';
require_once '../../../../server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Current, Resistance, and Electromotive Force</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../dist/css/style.css">
    <link rel="stylesheet" href="../../../../Modules/Materials.css">
</head>

<body>
    <?php require_once '../../../../layout/navbar.php'; ?>

    <div class="welcome-text">
        <h1 style="font-size: 40px"><b>Current, Resistance, and Electromotive Force</b></h1>
    </div>
    <div class="text">
        <p>
            The relationship between electric current, resistance, and electromotive force was discovered by Georg Simon Ohm and 
            published it in his 1827 paper. This is what we now know as Ohm's Law. Ohm's principal discovery was the amount of 
            electric current through a metal conductor in a circuit is directly proportional to the voltage impressed across it, 
            for any given temperature. Ohm expressed his discovery in the form of a simple equation, describing how voltage, current, 
            and resistance interrelate.
        </p>

        <p>
            A circuit is a closed conducting path through which charge flows. In circuits, charge goes around in loops. The charge 
            flow rate is called electric current. A circuit consists of circuit elements connected together by wires. A capacitor 
            is an example of a circuit element with which you are already familiar. We introduce some more circuit elements as ideal 
            circuit elements. There is a great deal of variety in the complexity of circuits. A computer is a complicated circuit. 
            A flashlight is a simple circuit.
        </p>

        <p>
            The kind of circuit elements that you will be dealing with in this course are two-terminal circuit elements. There are 
            several different kinds of two-terminal circuit elements, but they all have some things in common. A two-terminal 
            circuit element is a device with two ends, each of which is a conductor. The two conductors are called terminals. 
            The terminals can have many different forms. Some are wires, some are metal plates, some are metal buttons, and some 
            are metal posts. One connects wires to the terminals to make a circuit element part of a circuit.
        </p>

        <p>
            An important two-terminal circuit element is a seat of EMF. You can think of a seat of EMF as an ideal battery or as 
            an ideal power supply. What it does is to maintain a constant potential difference (a.k.a. a constant voltage) 
            between its terminals. One uses either the constant name 𝜀 (script E) or the constant name V to represent that 
            potential difference.
        </p>

        <p>
            To achieve a potential difference 𝜀 between its terminals, a seat of EMF, when it first comes into existence, has to 
            move some charge (we treat the movement of charge as the movement of positive charge) from one terminal to the other. 
            The “one terminal” is left with a net negative charge and “the other” acquires a net positive charge. The seat of EMF 
            moves charge until the positive terminal is at a potential 𝜀 higher than the negative terminal. Note that the seat of 
            EMF does not produce charge; it just pushes existing charge around. If you connect an isolated wire to the positive 
            terminal, then it is going to be at the same potential as the positive terminal, and, because the charge on the 
            positive terminal will spread out over the wire, the seat of EMF is going to have to move some more charge from the 
            lower-potential terminal to maintain the potential difference. One rarely talks about the charge on either terminal of 
            a seat of EMF or on a wire connected to either terminal. A typical seat of EMF maintains a potential difference
            between its terminals on the order of 10 volts and the amount of charge that has to be moved, from one wire whose 
            dimensions are similar to that of a paper clip, to another of the same sort, is on the order of a picometer. Also, the 
            charge pileup is almost instantaneous, so, by the time you finish connecting a wire to a terminal, that wire already 
            has the charge we are talking about. In general, we don't know how much charge is on the positive terminal and 
            whatever wire might be connected to it, and we don't care. It is minuscule. But, it is enough for the potential 
            difference between the terminals to be the rated voltage of the seat of EMF.
        </p>

        <p>
            You'll recall that electric potential is something that is used to characterize an electric field. In causing there to 
            be a potential difference between its terminals and between any pair of wires that might be connected to its terminals, 
            the seat of EMF creates an electric field. The electric field depends on the arrangement of the wires that are 
            connected to the terminals of the seat of EMF. The electric field is another quantity that we rarely discuss in 
            analyzing circuits. We can typically find out what we need to find out from the value of the potential difference 𝜀 
            that the seat of EMF maintains between its terminals. But, the electric field does exist, and, in circuits, the 
            electric field of the charge on the wires connected to the seat of EMF is what causes charge to flow in a circuit, 
            and charge flow in a circuit is a huge part of what a circuit is all about.
        </p>
		
		<p>
			We use the symbol in the figure to represent a seat of EMF in a circuit diagram (a.k.a. a schematic diagram of a circuit) where               the two collinear line segments represent the terminals of the seat of EMF, the one connected to the shorter of the parallel line             segments being the negative, lower-potential, terminal; and; the one connected to the longer of the parallel line segments being
            the positive, higher-potential, terminal.
		</p>
		
		<img src="/Modules/Physics/Images/Current, Resistance, and Electromotive Force.jpg" width="400"/>
		
		<p style="margin-top: 20px">
			The other circuit element in this chapter is the resistor. A resistor is a poor conductor. The resistance of a resistor is a                   measure of how poor a conductor the resistor is. The bigger the value of resistance, the more poorly the circuit element allows               charge to flow through itself. Resistors come in many forms. The filament of a light bulb is a resistor. A toaster element (the               part that glows red when the toaster is on) is a resistor. Humans manufacture small ceramic cylinders (with a coating of carbon               and a wire sticking out each end) to have certain values of resistance. Each one has its value of resistance indicated on the                 resistor itself. The symbol in Figure 5.2. is used to represent a resistor, R.
		</p>
		
		<img src="/Modules/Physics/Images/Current, Resistance, and Electromotive Force1.jpg" width="400"/>

    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="../../../../image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="Voice Command.js"></script>

    <?php require_once '../../../../layout/chat_button.php'; ?>
    <?php require_once '../../../../layout/script.php' ?>

</body>

</html>