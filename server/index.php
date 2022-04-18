<?php

session_start();

function my_autoloader($class_name){
    $classes_folder = 'classes/'.$class_name.'.php';
    $controller_folder = 'controller/'.$class_name.'.php';
    if(file_exists($classes_folder)){
        include_once $classes_folder;
    }else if(file_exists($controller_folder)){
        include_once $controller_folder;
    }
}

spl_autoload_register('my_autoloader');

include_once 'routes/web.php';