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
        <div class="card col-12 col-md-11 h-75" id="global-chat">
            <div class="card-body card-body-textarea h-100 overflow-auto">
                <div class="loader-ring">Loading...
                    <span class="ring"></span>
                </div>
            </div>
            <div class="card-footer">
                <form name="sendMessageForm">
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <div class="form-floating">
                                <input id="inputMessageText" class="form-control" placeholder="Leave a comment here">
                                <label for="floatingTextarea">Send message</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" class="button btn-send h-100 w-100" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once '../layout/chat_button.php'; ?>

    <?php require_once '../layout/script.php'; ?>
    <script src="/dist/js/chat/global.js"></script>
</body>
</html>