<?php

session_start();

if(isset($_SESSION['admin_login'])){
    if($_SESSION['admin_login'] == true){
        // code ...
    }else{
        header('location: /admin/login.php');
    }
}else{
    header('location: /admin/login.php');
}