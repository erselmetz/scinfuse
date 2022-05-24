const btn = document.getElementById('btn');
const result = document.createElement("div");
const processing = document.createElement("p");

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

if (typeof SpeechRecognition === "undefined") {

}

else {
    const recognition = new SpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onresult = event => {
        const last = event.results.length - 1;
        const res = event.results[last];
        const text = res[0].transcript;
        if (res.isFinal) {

            const response = process(text);
            const p = document.createElement("p");
            processing.innerHTML = "";
            result.appendChild(p);

            speechSynthesis.speak(new SpeechSynthesisUtterance(response));

        } else {

        }
    }

    let listening = false;
    toggleBtn = () => {
        if (listening) {
            recognition.stop();
            btn.textContent = "Talk to Scientia";
        } else {
            recognition.start();
            btn.textContent = "Stop listening";
        }
        listening = !listening;
    };
    btn.addEventListener("click", toggleBtn);
}

function process(otherInput) {

    let text = otherInput.replace(/\s/g, "");

    switch (text) {
        case "hello":
            return "Hello, I'm Siensia, let's begin!";
        case "hi":
            return "Hi, I'm Siensia, let's begin!";
        case "home":
            response = location.href = '../../../../home.php';
            return "Welcome to scienfuse!";

        case "storyboard":
            response = location.href = '../../../../Storyboard.php';
            return "sure, opening storyboard";

        case "simulations":
            response = location.href = '../../../../Simulations.php';
            return "sure, opening simulations";

        case "lectures":
            response = location.href = '../../../../Lectures.php';
            return "sure, opening lectures";

        case "earthlectures":
            response = location.href = '../../../../Lectures/Earth Science/index.php';
            return "Earth science lectures";

        case "biologylectures":
            response = location.href = '../../../../Lectures/Biology/index.php';
            return "Biology Lectures";

        case "chemistrylectures":
            response = location.href = '../../../../Lectures/Chemistry/index.php';
            return "Chemistry Lectures";
            
        case "physicslectures":
            response = location.href = '../../../../Lectures/Physics/index.php';
            return "Physics Lectures";

        case "modules":
            response = location.href = '../../../../Modules.php';
            return "sure, opening modules";

        case "earthmodules":
            response = location.href = '../../../../Modules/Earth Science/index.php';
            return "Earth Science Modules";

            case "moduleone":
            response = location.href = '../../../../Modules/Earth Science/Materials/Weathering and Erosion/Weathering and Erosion.php';
            return "Weathering and Erosion";

            case "read":
                return "The exchange of gases between the lungs and the environment aims to supply the body with oxygen and expire carbon dioxide. Oxygen is an important compound necessary to make energy in the process called cellular respiration. Cellular respiration is the process wherein cells undergo series of chemical reactions to generate adenosine triphosphate (ATP). Oxygen is an essential component in this transformation. Food that we eat needs to be simplified into its simplest form, glucose for the cell to utilize. Glucose, a simple sugar and oxygen are converted into ATP. So what role does oxygen play in this process? Let’s find out."+

"You might recall that in aerobic respiration, glucose reacts with oxygen to form ATP. Oxygen is the final electron acceptor in the electron transport chain (ETC). It combines with electrons and hydrogen ions producing water. But what if there is no presence of oxygen? Can ATP be generated without the use of oxygen?"+

"In anaerobic respiration, it begins the same way as aerobic respiration wherein the first step is glycolysis, creating 2 ATP from one carbohydrate molecule. However, in the end after creating the pyruvate molecule, it continues the same path as aerobic respiration."+
			
"In this manner, cells can still oxidize organic fuel and generate ATP without the use of oxygen. These are done by prokaryotic organisms that live in environments without or little amount of oxygen. They have the electron transport chain but do not make use of oxygen as the final electron acceptor at the end of the chain. Instead they make use of less electronegative substances such as sulfate ion (for sulfate reducing bacteria), others makes use of nitrate (N O 3), sulfur or any variety of molecules."+

"Fermentation does not also utilize oxygen. Same as cellular respiration, it also starts with glycolysis with pyruvate as the end product. However, pyruvate does not continue with oxidation, the citric acid cycle and the E T C. since the E T C is not functional, the N A D H produced in glycolysis, N A D H cannot lose its electrons to form NAD+ For this reason, the purpose of fermentation reaction is to regenerate the electron carrier N A D plus to N A D H produced in glycolysis."+

"In Lactic fermentation, NADH transfers its electrons directly to pyruvate producing lactate as a by product. Bacteria present in yogurt carry out lactic acid fermentation. When lactic acid are produced in muscles, it is transported through the bloodstream and liver where it is converted to pyruvate or stored in the muscle making it soar."+

"The NADH in Alcoholic fermentation donates its electrons producing ethanol as a by product. The first step is the removal of the carboxyl group from the pyruvate releasing CO2 producing acetaldehyde , a 2 carbon molecule. This is then followed by N A D H passing its electrons to acetaldehyde producing N A D plus forming ethanol."+

"Both process have advantage and disadvantages. In aerobic respiration, the process generates more ATP, making it efficient when it comes to supplying the body with ATP. It generates much more energy in comparison with anaerobic respiration. Without oxygen, the process cannot continue further to produce ATP. Although it produces more ATP, the reaction is very slow. Anaerobic respiration allows the survival of organisms in places where there is little or no supply of oxygen. Since it does not require oxygen, the reaction is very fast. However, it becomes a disadvantage for it produces less amount of ATP, making it inefficient in terms of ATP production. It also produces body toxins like lactic acid and ethyl alcohol.";

        case "biologymodules":
            response = location.href = '../../../../Modules/Biology/index.php';
            return "Biology Modules";

        case "chemistrymodules":
            response = location.href = '../../../../Modules/Chemistry/index.php';
            return "Chemistry Modules";

        case "physicsmodules":
            response = location.href = '../../../../Modules/Physics/index.php';
            return "Physics Modules";

        case "time":
            return new Date().toLocaleTimeString();
        case "stop":
            response = "Bye";
            toggleBtn();

    }

    return response;
}

function myFunction() {
    alert("Hello, I'm Scientia. You can give me any command by clicking the 'Talk to Scientia' button");
}