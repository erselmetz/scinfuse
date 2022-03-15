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