<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../global_function.php';

// retrieve group list
if(isset($_POST['retrieveGroupList'])){
    $data = [];
    $data['available'] = false;
    $data['group_list'] = [];
    $id = $auth->id();

    // hosting group
    $sql = "SELECT * FROM chat_group WHERE leader = '$id' ";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        $data['available'] = true;
        while ($row = $result->fetch_assoc()) {
            array_push($data['group_list'],[
                "id"=>$row['id'],
                "name"=>$row['name'],
                "group_status"=>$row['status']
            ]);
        }
    }

    // joined group
    $sql = "SELECT * FROM chat_group_member WHERE member_id = '$id'";
    $result = $db->query($sql);
    if($result->num_rows > 0){

        $joinedGroupId = [];

        while ($row = $result->fetch_assoc()) {
            array_push($joinedGroupId,$row['chat_group_id']);
        }

        for ($i = 0; $i < count($joinedGroupId); $i++) {
            $group_id = $joinedGroupId[$i];
            // get group info
            $sql = "SELECT * FROM chat_group WHERE id = '$group_id' ";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                $data['available'] = true;
                while ($group = $result->fetch_assoc()) {
                    array_push($data['group_list'],[
                        "id"=>$group['id'],
                        "name"=>$group['name'],
                        "group_status"=>$group['status']
                    ]);
                }
            }
        }
        
    }
    echo json_encode($data);
}

// check id if exist
if(isset($_POST['groupIdIsset'])){
    $data = [
        'status'=>true
    ];
    $user_id = $auth->id();
    // check if group id exist
    $gi = htmlentities($_POST['id']);
    $sql = "SELECT * FROM chat_group WHERE id=$gi LIMIT 1";
    $result = $db->query($sql);
    if( !$result->num_rows > 0 ){
        $data['status'] = false;
    }else{
        while ($row = $result->fetch_assoc()) {
            $data['code'] = $row['code'];
            $data['name'] = $row['name'];
        }
    }

    //check if the user is the leader of this group
    $sql = "SELECT * FROM chat_group WHERE id=$gi AND leader=$user_id LIMIT 1";
    $result = $db->query($sql);
    if( !$result->num_rows > 0 ){
        // check if the user is also a member of the group
        $sql = "SELECT * FROM chat_group_member WHERE chat_group_id=$gi LIMIT 1";
        $result = $db->query($sql);
        if( !$result->num_rows > 0 ){
            $data['status'] = false;
        }
    }
    echo json_encode($data);
}

// if delete group is set
if(isset($_POST['requestDeleteGroup'])){
    if($_POST['requestDeleteGroup'] == true){
        $id = htmlentities($_POST['id']);
        $user_id = $auth->id();
        $data = [];
        // check if its the user is the leader of the group
        $sql = "SELECT * FROM chat_group WHERE id='$id' AND leader='$user_id' LIMIT 1";
        $result = $db->query($sql);
        if( $result->num_rows > 0 ){
            // delete group message
            $sql = "DELETE FROM chat_group_message WHERE group_id='$id' ";
            if( $db->query($sql) === TRUE ){
                // delete member
                $sql = "DELETE FROM chat_group_member WHERE chat_group_id='$id'";
                if( $db->query($sql) === TRUE ){
                    // delete group
                    $sql = "DELETE FROM chat_group WHERE id='$id' AND leader='$user_id'";
                    if( $db->query($sql) === TRUE ){
                        $data['status'] = 'success';
                    }
                }   
            }
        }
        echo json_encode($data);
    }
}

// if leaveGroup is set
if(isset($_POST['requestLeaveGroup'])){
    if( $_POST['requestLeaveGroup'] == TRUE ){
        // variables
        $user_id = $auth->id();
        $id = htmlentities($_POST['id']);

        // check if the user is a member
        $sql = "SELECT * FROM chat_group_member WHERE member_id='$user_id' AND position='member' AND chat_group_id='$id' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $sql = "DELETE FROM chat_group_member WHERE chat_group_id='$id' AND member_id=$user_id";
            if( $db->query($sql) === TRUE ){
                echo 'success';
            }
        }
    }
}

// check user status
if(isset($_POST['userStatus'])){
    if($_POST['userStatus'] == true){
        $user_id = $auth->id();
        $id = $_POST['id'];
        $data = ['user'=>''];
        // check if the user is leader
        $sql = "SELECT * FROM chat_group WHERE id=$id AND leader=$user_id LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data['user'] = 'leader';
        }
        // check if the user is admin or member
        $sql = "SELECT * FROM chat_group_member WHERE chat_group_id=$id AND member_id='$user_id' LIMIT 1";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data['user'] = 'member';
        }
        echo json_encode($data);
    }
}

// retrieve chat box
if(isset($_POST['retrieveGroupMessage'])){
    if($_POST['retrieveGroupMessage'] == true){
        $gi = htmlentities($_POST['id']);
        $sql = "SELECT * FROM chat_group_message WHERE group_id=$gi";
        $groupChat = $db->query($sql);
        $data = [];
        if( $groupChat->num_rows > 0 ){
            while ($row = $groupChat->fetch_assoc()) {
                if($auth->id() == $row['member_id']){
                    array_push($data,[
                        "id"=>$row['id'],
                        "group_id"=>$row['group_id'],
                        "member_id"=>$row['member_id'],
                        "member_name"=>$auth->first_name(),
                        "message"=>$row['message'],
                    ]);
                }else{
                    $sql="SELECT * FROM users WHERE id='$row[member_id]' LIMIT 1";
                    $result = $db->query($sql);
                    $userinfo = $result->fetch_assoc();
                    array_push($data,[
                        "id"=>$row['id'],
                        "group_id"=>$row['group_id'],
                        "member_id"=>$row['member_id'],
                        "member_name"=>$userinfo['fname'],
                        "message"=>$row['message'],
                    ]);
                }
            }
        }
        echo json_encode($data);
    }
}

// send message
if(isset($_POST['requestSendGroupMessage'])){
    if($_POST['requestSendGroupMessage'] == true){
        $message = htmlentities($_POST['messageText']);
        $gi = htmlentities($_POST['gi']);
        $user_id = $auth->id();
        $sql = "INSERT INTO chat_group_message (group_id,member_id,message) VALUES ('$gi','$user_id','$message')";
        if($db->query($sql) === TRUE){
            echo "success";
        }
    }
}

// request to get group code