<?php

require_once 'db.php';
require_once 'global_function.php';

if(isset($_POST['uAndPparameter'])){
    if($_POST['uAndPparameter'] == true){
        $u = htmlentities($_POST['u']);
        $p = htmlentities($_POST['p']);

        $data = [];

        // check u and p parameter
        $sql = "SELECT * FROM users WHERE email='$u' or username='$u' AND password='$p' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        echo json_encode($data);
    }
}

if(isset($_POST['submit_change_password'])){
    if($_POST['submit_change_password'] == true){

        $u = htmlentities($_POST['u']);
        $p = htmlentities($_POST['p']);
        $old = htmlentities($_POST['old_password']);
        $new = htmlentities($_POST['new_password']);
        $repeat_new = htmlentities($_POST['repeat_new_password']);

        $data = [];
        $data['status'] = false;
        $data['old_password'] = false;
        $data['new_password'] = $new;
        $data['repeat_new_password'] = $repeat_new;

        // verify old password
        $old_verify = password_verify($old, $p);
        if($old_verify){
            $data['old_password'] = true;
            if($new == $repeat_new){
                // code here
                $password_hash = password_hash($new, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET password='$password_hash' WHERE email='$u' or username='$u' LIMIT 1";
                if($db->query($sql) == true ){
                    $data['status'] = true;
                    session_start();
                    session_destroy();
                }
            }
        }

        echo json_encode($data);
    }
}