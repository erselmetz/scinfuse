<?php

if(isset($_POST['requestToLogout'])){
    if($_POST['requestToLogout'] == true){
        session_start();

        session_destroy();

        $data = [];
        $data['login'] = false;

        echo json_encode($data);
    }
}