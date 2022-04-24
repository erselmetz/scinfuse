<?php

session_start();

// if user is not set redirect to login page
if(!isset($_SESSION['auth_username']) && !isset($_SESSION['auth_password'])){
    header('Location: /login.php');
}
