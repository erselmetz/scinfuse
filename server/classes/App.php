<?php

class App{
    
    public static function authenticated($params){
        if ( isset($_SESSION['auth_username']) && isset($_SESSION['auth_password']) 
            && isset($_SESSION['auth_token']) && isset($_SESSION['auth_email'])
            && isset($_SESSION['auth_fname']) && isset($_SESSION['auth_lname'])
        ) {
            $params();
        }
    }

    public static function randomString($lenght){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLenght = strlen($characters)-1;
        $randomString = '';
        for($i = 0; $i < $lenght; $i++){
            $randomString .= $characters[rand(0,$charactersLenght)];
        }
        return $randomString;
    }
}