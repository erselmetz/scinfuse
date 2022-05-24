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
            processing.innerHTML = "p";
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
            response = location.href = '../../home.php';
            return "Welcome to scienfuse!";

        case "storyboard":
            response = location.href = '../../Storyboard.php';
            return "sure, opening storyboard";

        case "simulations":
            response = location.href = '../../Simulations.php';
            return "sure, opening simulations";

        case "lectures":
            response = location.href = '../../Lectures.php';
            return "sure, opening lectures";

        case "earthlectures":
            response = location.href = '../../Lectures/Earth Science/index.php';
            return "Earth science lectures";

        case "biologylectures":
            response = location.href = '../../Lectures/Biology/index.php';
            return "Biology Lectures";

        case "chemistrylectures":
            response = location.href = '../../Lectures/Chemistry/index.php';
            return "Chemistry Lectures";
            
        case "physicslectures":
            response = location.href = '../../Lectures/Physics/index.php';
            return "Physics Lectures";

        case "modules":
            response = location.href = '../../Modules.php';
            return "sure, opening modules";

        case "earthmodules":
            response = location.href = '../../Modules/Earth Science/index.php';
            return "Earth Science Modules";

        case "biologymodules":
            response = location.href = '../../Modules/Biology/index.php';
            return "Biology Modules";

        case "chemistrymodules":
            response = location.href = '../../Modules/Chemistry/index.php';
            return "Chemistry Modules";
			
			case "module1":
            response = location.href = '../../Modules/Chemistry/Materials/Ideal Gas Law and Dalton’s Law of Partial Pressures/Ideal Gas Law and Dalton’s Law of Partial Pressures.php';
            return "Ideal Gas Law and Dalton’s Law of Partial Pressures";

        case "physicsmodules":
            response = location.href = '../../Modules/Physics/index.php';
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