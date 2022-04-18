<?php

class Route{

    static $url = [];

    public static function make($params, $callback){
        self::$url[$params] = $callback;
    }

    public static function execute(){

        $url_string = substr($_SERVER['REQUEST_URI'],7);
        $server = parse_url($url_string,PHP_URL_PATH);
        
        if ( in_array($server,array_keys(self::$url)) ) {
            self::$url[$server]();
        }else{
            echo 'not found';
        }
    }
    
}