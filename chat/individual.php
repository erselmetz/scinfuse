<?php

require_once '../server/auth.php';
require_once '../server/db.php';
require_once '../server/global_function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Individual</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>

<body>

    <?php require_once '../layout/navbar.php'; ?>

    <div class="chat_individual_message_area d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-11 h-75" id="individual-chat">
            <div class="card-header">
                <h4 style="text-transform: capitalize">
                    <a class="text-decoration-none" href="/chat/individual.php">&lt;</a>
                </h4>
            </div>
            <div class="card-body overflow-auto" id="card-body-textarea" style="color: black">
                <div class="loader-ring">Loading...
                    <span class="ring"></span>
                </div>
            </div>
            <div class="card-footer">
                <form name="sendMessageForm">
                    <div class="row">
                        <div class="col-12 col-md-10" style="color: black">
                            <div class="form-floating">
                                <input id="inputMessageText" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea">
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

    <div class='chat_individual_user_list d-flex justify-content-center align-items-center vh-100'>
        <div class='card col-12 col-md-11 h-75' id="individual-names">
            <form name="search_user" method="POST" class="d-flex">
                <input class="form-control me-2" name="name" type="search" placeholder="Search" aria-label="Search">
                <button class="button searchbtn" type="submit">Search</button>
            </form>
            <div class='card-body overflow-auto'>
                <div class="loader-ring">Loading...
                    <span class="ring"></span>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../layout/chat_button.php'; ?>

    <?php require_once '../layout/script.php'; ?>
    <script src="/dist/js/chat/individual.js"></script>
</body>

<style>

    .d-flex{
        color: white;
    }

</style>

</html>