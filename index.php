<?php

require_once 'server/global_function.php';

require_once 'server/auth.php';

if(isset($_SESSION['auth_username']) && isset($_SESSION['auth_password'])){
    header('location: /home.php');
}