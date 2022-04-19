<?php

class Chat{

    // ============================= individual ====================================

    public static function individual_get_user(){
        // get user 
        if(isset($_POST['requestToGetUser'])){
            if($_POST['requestToGetUser'] == true){
                $db = DB::connection();
                $id = Auth::id();
                $limit = htmlentities($_POST['limit']);
                $data = [];
                $result = $db->query("SELECT * FROM users WHERE id != '$id' LIMIT $limit");

                if( $result->num_rows > 0 ){
                    while ( $row = $result->fetch_assoc() ) {
                        $sql = "SELECT * FROM chat_individual WHERE from_id=$id AND to_id=$row[id] OR from_id=$row[id] AND to_id=$id";
                        $result = $db->query($sql);
                        if( $result->num_rows > 0 ){
                            while($row = $result->fetch_assoc()){ 
                                $sql = "SELECT * FROM users WHERE id=$row[to_id] OR id=$row[from_id] AND id!=$id";
                                $result = $db->query($sql);
                                if($result->num_rows > 0){
                                    while( $row = $result->fetch_assoc() ){
                                        array_push($data,[
                                            "id"=>$row['id'],
                                            "name"=>$row['fname'].' '.$row['lname']
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
                echo json_encode($data);
            }
        }
    }  

    public static function individual_search_user(){
        // get user by using search method 
        if(isset($_POST['searchToGetUser'])){
            if($_POST['searchToGetUser'] == true){
                $name = htmlentities($_POST['name']);
                $id = $auth->id();
                $limit = htmlentities($_POST['limit']);
                $data = [];
                if( $name !=null || $name != '' ){
                    $sql = "SELECT * FROM users WHERE lname LIKE '%$name%' OR fname LIKE '%$name%' AND id!='$id' LIMIT $limit";
                    $result = $db->query($sql);

                    if($result->num_rows > 0){
                        while( $row = $result->fetch_assoc() ){
                            array_push($data,[
                                "id"=>$row['id'],
                                "name"=>$row['fname'].' '.$row['lname']
                            ]);
                        }
                    }
                }
                echo json_encode($data);
            }
        }
    }

    public static function individual_retrieve_chat_box(){
        // individual chat
        if(isset($_POST['retrieveChatBoxIndividual'])){
            if($_POST['retrieveChatBoxIndividual'] == true){
                $to_id = htmlentities($_POST['id']);
                $user_id = $auth->id();

                $sql = "SELECT * FROM chat_individual WHERE from_id='$user_id' AND to_id='$to_id' OR to_id='$user_id' AND from_id='$to_id'";
                $result = $db->query($sql);
                if($result->num_rows > 0){
                    $data = [];
                    while($row = $result->fetch_assoc()){
                        array_push($data,[
                            "from"=>$row['from_id'],
                            "message"=>$row['message']
                        ]);
                    }
                    echo json_encode($data);
                }
            }
        }
    }

    public static function individual_send_message(){
        // send message
        if(isset($_POST['requestSendIndividualMessage'])){
            if($_POST['requestSendIndividualMessage'] == true){
                $message = htmlentities($_POST['messageText']);
                $to_id = htmlentities($_POST['to_id']);
                $user_id = $auth->id();
                $sql = "INSERT INTO chat_individual (from_id,message,to_id) VALUES ('$user_id','$message','$to_id')";
                if($db->query($sql) === TRUE){
                    echo "success";
                }
            }
        }
    }

    public static function individual_validate_user(){
        //check the if did exist if not then redirect to individual page
        if(isset($_POST['requestToCheckUserId'])){
            if($_POST['requestToCheckUserId'] == true){
                $data = [
                    "status"=>'success',
                ];
                $id = htmlentities($_POST['id']);
                $user_id = $auth->id();

                $sqlGetid = "SELECT * FROM users WHERE id='$id' AND id!='$user_id' LIMIT 1";
                $result = $db->query($sqlGetid);
                if($result->num_rows < 1){
                    $data['status']= 'error';
                }else{
                    $row = $result->fetch_assoc();
                    $data['name'] = $row['fname'].' '.$row['lname'];
                }

                echo json_encode($data);
            }
        }
    }

    // ============================= Global ====================================

    public static function global_retrieve_chat_box(){
        if(isset($_POST['retrieveChatBoxGlobal'])){
            if($_POST['retrieveChatBoxGlobal'] == true){

                // ========== return this data ==========
                $data = [];

                $sql = "SELECT * FROM chat_global LIMIT 15";
                $result = $db->query($sql);
                if( $result->num_rows > 0 ){
                    while( $row = $result->fetch_assoc() ){
                        array_push($data,[
                            'id'=>$row['id'],
                            'user_id'=>$row['user_id'],
                            'name'=>$row['name'],
                            'message'=>$row['message']
                        ]);
                    }
                }
                echo json_encode($data);
            }
        }
    }

    public static function global_send_message(){
        if(isset($_POST['requestSendGlobalMessage'])){
            if( $_POST['requestSendGlobalMessage'] == true ){
                $id = $auth->id();
                $from_name = $auth->fullname();   
                $message = htmlentities($_POST['messageText']);

                // ========== return this data ==========
                $data = [];

                $sql = "INSERT INTO chat_global (user_id, name, message) VALUES ('$id','$from_name','$message')";
                $result = $db->query($sql);
                if( $result == true ){
                    $data['status'] = true;
                }
                echo json_encode($data);
            }
        }
    }
    
    
    // ============================= Group ====================================

    public static function group_list(){
        // retrieve group list
        if(isset($_POST['retrieveGroupList'])){
            $data = [];
            $id = Auth::id();

            // hosting group
            $sql = "SELECT * FROM chat_group WHERE leader = '$id' ";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    array_push($data,[
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
                        while ($group = $result->fetch_assoc()) {
                            array_push($data,[
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
    }

    public static function group_id_exists(){
        // check group id if exist
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
    }

    public static function group_delete(){
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
    }

    public static function group_leave(){
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
    }

    public static function group_user_status(){
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
    }

    public static function group_retrieve_chat_box(){
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
    }

    public static function group_send_message(){
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
    }

    public static function group_joined(){

    }

    public static function group_create(){
        $groupCode = App::randomString(3).'-'.App::randomString(4).'-'.App::randomString(3);

        if(isset($_POST['requestToCreateGroup'])){
            if(isset($_POST['groupStatus'])){
                $name = htmlentities($_POST['groupName']);
                $status = htmlentities($_POST['groupStatus']);
                $code = $groupCode;
                $user_id = $auth->id();
        
                // trim
                $nameTrim = trim($name);
                $statusTrim = trim($status);
        
                if( !empty($nameTrim)&&!empty($statusTrim) ){
                    $sqlGroupChat = "INSERT INTO chat_group (name,status,code,leader) VALUES ('$name','$status','$code','$user_id')";
                    if( $db->query($sqlGroupChat) === TRUE ){
                        header('location: ./group.php');
                    }
        
                }
            }else{
                $message_error = "select group status";
            }
        
        }
    }
}