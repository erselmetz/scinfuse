<?php 

require_once '../server/auth.php'; 
require_once '../server/global_function.php'; 

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
    <script src="/dist/js/jquery.js"></script>
    <script>
        const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
        sendMessageForm.addEventListener('submit',(e) => {
            e.preventDefault();
            const messageText = document.querySelector('#inputMessageText');

            $.ajax({
                type: 'POST',
                url: '/server/chat/global.php',
                data: {
                    requestSendGlobalMessage: true,
                    messageText: messageText.value
                },
                success: function(){
                    messageText.value = null
                }
            });
        });
        function retrieveChatBox(params) {
            $.ajax({
                type: 'POST',
                url: '/server/chat/global.php',
                data: {
                    retrieveChatBoxGlobal: true
                },
                success: function(a){
                    $('#card-body-textarea').html(a);
                }
            });
        }
        retrieveChatBox();
        setInterval(() => {
            retrieveChatBox();
        }, 1000);
    </script>
</body>
</html>