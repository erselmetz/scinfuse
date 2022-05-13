<?php

function notification($message){
    return "
    <div class='w3-modal w3-show notification' style='z-index:10'>
        <div class='w3-modal-content'>
            <div class='w3-bar'>
                <span class='w3-bar-item w3-large w3-cursor-pointer w3-right' 
                    onclick='document.querySelector(\".notification\").classList.remove(\"w3-show\")'>
                    X    
                </span>
                <span class='w3-bar-item w3-left'>Notification</span>
            </div>
            <div class='w3-container'>
                <p>$message</p>
            </div>
            <div class='w3-bar w3-padding'>
                <button class='w3-bar-item w3-right w3-button w3-hover-none w3-text-blue w3-border w3-border-blue w3-hover-text-black w3-hover-border-black' onclick='document.querySelector(\".notification\").classList.remove(\"w3-show\")'>Ok</button>
            </div>
        </div>
    </div>
    ";
}