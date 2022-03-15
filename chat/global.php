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
    <title>Chat | Global</title>

    <!-- style link -->
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>
   
    <?php require_once '../layout/navbar.php'; ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-8 h-75">
            <div class="card-body h-100 overflow-auto">
                <div id="card-body-textarea"></div>
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

    <script src="/dist/js/bootstrap.js"></script>
    <script>
        const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
        sendMessageForm.addEventListener('submit',(e) => {
            e.preventDefault();
            const messageText = document.querySelector('#inputMessageText'); 
            const data = new FormData();
            data.append('requestSendGlobalMessage','true');
            data.append('messageText', messageText.value);
            fetch('./sendMessage.php',{
                method: "POST",
                body: data
            }).then(() => messageText.value = '');
        });
        function refreshChatBox(params) {
            const data = new FormData();
            data.append('refreshChatBoxGlobal','true');

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
</body>
</html>