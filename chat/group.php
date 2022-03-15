<?php

require_once '../auth.php';
require_once '../db.php';

// BkC-o52d-EhB

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Group</title>

    <!-- style link -->
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>
    <?php require_once '../layout/navbar.php'; ?>

    <?php
        // if id is set
    if(isset($_GET['id'])){ 

        // check if group id exist
        $gi = htmlentities($_GET['id']);
        $sql = "SELECT * FROM chat_group WHERE id=$gi LIMIT 1";
        $result = $db->query($sql);
        if( !$result->num_rows > 0 ){
            header('location: group.php');
        }

        //check if the user is the leader of this group
        $sql = "SELECT * FROM chat_group WHERE id=$gi AND leader=$_SESSION[user_id] LIMIT 1";
        $result = $db->query($sql);
        if( !$result->num_rows > 0 ){
            // check if the user is also a member of the group
            $sql = "SELECT * FROM chat_group_member WHERE chat_group_id=$gi LIMIT 1";
            $result = $db->query($sql);
            if( !$result->num_rows > 0 ){
                header('location: group.php');
            }
        }

        // if leaveGroup is set
        if(isset($_GET['leaveGroup'])){
            $sql = "DELETE FROM chat_group_member WHERE chat_group_id=$_GET[id] AND member_id=$_SESSION[user_id]";
            if( $db->query($sql) === TRUE ){
                header("location: group.php");
            }
        }
        // if delete group is set
        if(isset($_GET['deleteGroup'])){
            // check if its the user is the leader of the group
            $sql = "SELECT * FROM chat_group WHERE id=$_GET[id] AND leader=$_SESSION[user_id] LIMIT 1";
            $result = $db->query($sql);
            if( $result->num_rows > 0 ){
                // delete group message
                $sql = "DELETE FROM chat_group_message WHERE group_id=$_GET[id] ";
                if( $db->query($sql) === TRUE ){
                    // delete member
                    $sql = "DELETE FROM chat_group_member WHERE chat_group_id=$_GET[id]";
                    if( $db->query($sql) === TRUE ){
                        // delete group
                        $sql = "DELETE FROM chat_group WHERE id=$_GET[id] AND leader=$_SESSION[user_id]";
                        if( $db->query($sql) === TRUE ){
                            header("location: group.php");
                        }
                    }   
                }
            }
        }

    ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-8 h-75">
                <div class="card-header d-flex justify-content-between">
                    <a type="button" class="btn btn-primary" href="group.php">&lt;</a>
                    <div class="dropdown">
                        <button class="btn btn-primary" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            &vellip;
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <?php
                                // check if the user is leader
                                $sql = "SELECT * FROM chat_group WHERE id=$_GET[id] AND leader=$_SESSION[user_id] LIMIT 1";
                                $result = $db->query($sql);
                                if($result->num_rows > 0){
                                    echo "
                                        <a class='dropdown-item' href='group.php?id=$_GET[id]&deleteGroup'>Delete</a>
                                    ";
                                }
                                // check if the user is admin or member
                                $sql = "SELECT * FROM chat_group_member WHERE chat_group_id=$_GET[id] AND member_id='$_SESSION[user_id]' LIMIT 1";
                                $result = $db->query($sql);
                                if($result->num_rows > 0){
                                    echo "
                                        <a class='dropdown-item' href='group.php?id=$_GET[id]&leaveGroup'>Leave Group</a>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                
                </div>
                <div class="card-body overflow-auto">
                    <div id="card-body-textarea"></div>
                </div>
                <div class="card-footer">
                    <form name="sendMessageForm">
                        <div class="row">
                            <div class="col-10">
                                <div class="form-floating">
                                    <input id="inputMessageText" class="form-control" autocomplete="off" placeholder="Leave a comment here" id="floatingTextarea">
                                    <label for="floatingTextarea">Send message</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary">send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // send message
            const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
            sendMessageForm.addEventListener('submit',(e) => {
                e.preventDefault();
                const messageText = document.querySelector('#inputMessageText'); 
                const data = new FormData();

                data.append('requestSendGroupMessage','true');
                data.append('messageText', messageText.value);
                data.append('gi', <?php echo $_GET['id'] ?>);

                fetch('./sendMessage.php',{
                    method: "POST",
                    body: data
                }).then(res => res.text())
                .then(res => {
                    messageText.value = '';
                    console.log(res);
                });
            });
            // refresh message box
            function refreshChatBox(params) {
                const data = new FormData();

                data.append('refreshChatBoxGroup','true');
                data.append('id', <?php echo $_GET['id'] ?>);

                fetch('./refreshChatBox.php',{
                    method: "POST",
                    body: data
                })
                .then(response => response.text())
                .then(res => {
                    document.querySelector('#card-body-textarea').innerHTML = res;
                })
            }
            refreshChatBox();
            setInterval(() => {
                refreshChatBox();
            }, 1000);
        </script>
    <?php }else{ ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-8 h-75">
                <div class="card-header">
                    <div class="btn-group">
                        <a type="button" class="btn btn-primary" href="./createGroup.php">create group</a>
                        <a type="button" class="btn btn-primary" href="./joinGroup.php">join group</a>
                    </div>
                </div>
                <div class="card-body overflow-auto">
                    <?php
                        // hosting group
                        $sql = "SELECT * FROM chat_group WHERE leader = $_SESSION[user_id]";
                        $result = $db->query($sql);
                        if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                    <a class='d-flex justify-content-start btn btn-outline-secondary mb-2' href='group.php?id=$row[id]'>
                                        <h5>$row[name]</h5><span class='tag'>($row[status])</span>
                                    </a>
                                ";
                            }
                        }
                        // joined group
                        $sql = "SELECT * FROM chat_group_member WHERE member_id=$_SESSION[user_id]";
                        $result = $db->query($sql);
                        if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                // assign variables
                                $group_id = $row['chat_group_id'];
                                // get group info
                                $sql = "SELECT * FROM chat_group WHERE id=$group_id";
                                $result = $db->query($sql);
                                if($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
                                            <a class='d-flex justify-content-start btn btn-outline-secondary mb-2' href='group.php?id=$row[id]'>
                                                <h5>$row[name]</h5><span class='tag'>($row[status])</span>
                                            </a>
                                        ";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="/dist/js/bootstrap.js"></script>
</body>
</html>