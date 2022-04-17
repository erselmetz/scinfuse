<?php

session_start();

require_once 'db.php';
require_once 'global_function.php';

// profile
if( isset($_POST['update_profile']) ){
    if( $_POST['update_profile'] == true ){
        $user_id = $auth->id();

        $username = htmlentities($_POST['username']);
        $number = htmlentities($_POST['number']);
        
        $data = [];
        $data['status'] = false;
        $data['username'] = $username;
        $data['number'] = $number;

        $sql = "UPDATE users SET username='$username',phone_number='$number' WHERE id='$user_id'";
        if( $db->query($sql) == TRUE ){
            $data['status'] = true;

            // set value
            $auth->set_username($username);
            $auth->set_phone_number($number);
        }

        echo json_encode($data);
    }
}


// email
if(isset($_POST['change_email'])){
    if($_POST['change_email'] == true){

        $user_id = $auth->id();
        $old_email = $auth->email();
        $new_email = htmlentities($_POST['new_email']);

        $data = [];
        $data['email_changed'] = false;

        if( $old_email != $new_email ){
            if( !empty($new_email) ){
                $data['same_email'] = false;

                $sql = "UPDATE users SET email='$new_email' WHERE id='$user_id' LIMIT 1";
                $result = $db->query($sql);
                if($result === true){
                    $data['email_changed'] = true; 
                    $auth->set_email($new_email);
                }
            }
        }else{
            $data['same_email'] = true;
        }

        echo json_encode($data);
    }
}
// password
if(isset($_POST['submit_change_password'])){
    if($_POST['submit_change_password'] == true){

        // $u = htmlentities($_POST['u']);
        $u = $auth->email();
        $p = $auth->password();
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

