<?php

class Auth{
    // get value of session
    public static function id(){
        return $_SESSION['auth_id'];
    }
    
    public static function first_name(){
        return $_SESSION['auth_fname'];
    }
    
    public static function last_name(){
        return $_SESSION['auth_lname'];
    }
    
    public static function fullname(){
        return $_SESSION['auth_fullname'];
    }
    
    public static function username(){
        return $_SESSION['auth_username'];
    }
    
    public static function email(){
        return $_SESSION['auth_email'];
    }
    
    public static function phone_number(){
        return $_SESSION['auth_phone_number'];
    }
    
    public static function password(){
        return $_SESSION['auth_password'];
    }
    
    public static function token(){
        return $_SESSION['auth_token'];
    }
    // set value of session
    public static function set_id($params){
        $_SESSION['auth_id'] = $params;
    }
    
    public static function set_first_name($params){
        $_SESSION['auth_fname'] = $params;
    }
    
    public static function set_last_name($params){
        $_SESSION['auth_lname'] = $params;
    }
    
    public static function set_fullname($params){
        $_SESSION['auth_fullname'] = $params;
    }
    
    public static function set_username($params){
        $_SESSION['auth_username'] = $params;
    }
    
    public static function set_email($params){
        $_SESSION['auth_email'] = $params;
    }
    
    public static function set_phone_number($params){
        $_SESSION['auth_phone_number'] = $params;
    }
    
    public static function set_password($params){
        $_SESSION['auth_password'] = $params;
    }
    
    public static function set_token($params){
        $_SESSION['auth_token'] = $params;
    }
}