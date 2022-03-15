<?php

session_start();

// if user is not set redirect to login page
if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    header('Location: ./login.php');
}