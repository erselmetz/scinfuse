<?php

require_once '/server/auth.php';

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    header('location: /home.php');
}