<?php

require_once '../auth.php';
require_once '../db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Individual</title>

    <!-- style link -->
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>

    <?php require_once '../layout/navbar.php'; ?>
    
    <?php if(isset($_GET['id'])){ 
        //check the if did exist if not then redirect to individual page
        $sqlGetid = "SELECT * FROM users WHERE id='$_GET[id]' AND id!='$_SESSION[user_id]' LIMIT 1";
        $result = $db->query($sqlGetid);
        if($result->num_rows < 1){
            header("Location: /chat/individual.php");
        }
    ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-8 h-75">
                <div class="card-header">
                    <h4>
                        <a class="text-decoration-none" href="/chat/individual.php">&lt;</a>
                        <?php
                            $sqlGetName = "SELECT * FROM users WHERE id=$_GET[id] LIMIT 1";
                            $result = $db->query($sqlGetName);
                            if ( $result->num_rows > 0 ) {
                                $row = $result->fetch_assoc();
                                echo "<span>$row[fname] $row[lname]</span>";
                            }
                        ?>
                    </h4>
                </div>
                <div class="card-body overflow-auto">
                    <!-- textarea -->
                    <div id="card-body-textarea" class="w-100"></div>
                </div>
                <div class="card-footer">
                    <form name="sendMessageForm">
                        <div class="row">
                            <div class="col-10">
                                <div class="form-floating">
                                    <input id="inputMessageText" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
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

                data.append('requestSendIndividualMessage','true');
                data.append('messageText', messageText.value);
                data.append('to_id', <?php echo $_GET['id'] ?>);

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

                data.append('refreshChatBoxIndividual','true');
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
        <div class='d-flex justify-content-center align-items-center vh-100'>
            <div class='card col-12 col-md-8 h-75'>
                <div class='card-body overflow-auto'>
                    <?php 
                        $userAvailable = $db->query("SELECT * FROM users WHERE id != '$_SESSION[user_id]' ");
                        while($row = $userAvailable->fetch_assoc()){
                            echo "<a href='individual.php?id=$row[id]'>$row[fname] $row[lname]</a><br>";
                        }
                    ?>
                </div>
            </div>
        </div>
        
    <?php } ?>

    <script src="/dist/js/bootstrap.js"></script>
</body>
</html>