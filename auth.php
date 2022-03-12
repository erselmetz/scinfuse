<?php

session_start();

// if user is not set redirect to login page
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header('Location: ./login.php');
}