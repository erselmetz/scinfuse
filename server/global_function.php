<?php

$message_success = '';
$message_error = '';

function message_alert($params){
    if( array_key_exists('success',$params) ){
        if( $params['success'] ){
            echo "
            <div class='alert alert-success' role='alert'>
                <strong>$params[success]</strong>
            </div>
            ";
        }
    }
    if( array_key_exists('error',$params) ){
        if( $params['error'] ){
            echo "
            <div class='alert alert-danger' role='alert'>
                <strong>$params[error]</strong>
            </div>
            ";
        }
    }
}

function randomString($lenght){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLenght = strlen($characters)-1;
    $randomString = '';
    for($i = 0; $i < $lenght; $i++){
        $randomString .= $characters[rand(0,$charactersLenght)];
    }
    return $randomString;
}

function console($params){
    echo "
    <script>
        console.log('$params');
    </script>
    ";
}

function authenticated(){
    if(isset($_SESSION['auth_username']) && isset($_SESSION['auth_password'])){
        return true;
    }
}


// ==========================================================
 
class Auth{

    public function id(){
        return $_SESSION['auth_id'];
    }
    
    public function first_name(){
        return $_SESSION['auth_fname'];
    }
    
    public function last_name(){
        return $_SESSION['auth_lname'];
    }
    
    public function fullname(){
        return $_SESSION['auth_fullname'];
    }
    
    public function username(){
        return $_SESSION['auth_username'];
    }
    
    public function email(){
        return $_SESSION['auth_email'];
    }
    
    public function password(){
        return $_SESSION['auth_password'];
    }

    public function token(){
        return $_SESSION['auth_token'];
    }
    
}

class Server{
    public function php_self(){
        return $_SERVER['PHP_SELF'];
    }
}

$server = new Server;

// for authenticated only
if( authenticated() ){
    $auth = new Auth;
}