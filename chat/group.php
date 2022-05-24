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
    <title>Chat | Group</title>

    <!-- style link -->
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>
    <?php require_once '../layout/navbar.php'; ?>

    <div class="Group_Message d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-11 h-75" id="group-chat">
            <div class="card-header d-flex justify-content-between">
                <div class="text-white">
                    <a type="button" href="group.php">&lt;</a>
                    <span id="groupNameHere"></span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton1">
                    </button>
                    <ul class="dropdown-menu" id="moreOptionHeader" aria-labelledby="dropdownMenuButton1"></ul>
                </div>
            </div>
            <div class="card-body overflow-auto" id="card-body-textarea"></div>
            <div class="card-footer">
                <form name="sendMessageForm">
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <div class="form-floating">
                                <input id="inputMessageText" class="form-control" autocomplete="off" placeholder="Leave a comment here" id="floatingTextarea">
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

    <!-- group list -->
    <div class="Group_List d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-11 h-75" id="group">
            <div class="card-header">
                <div class="btn-group">
                    <div class="create">
                        <a type="button" class="button create-btn" href="./createGroup.php">Create group</a>
                    </div>
                    <div class="join">
                        <a type="button" class="button join-btn" href="./joinGroup.php">Join group</a>
                    </div>
                </div>
            </div>
            <div class="card-body overflow-auto">
                
            </div>
        </div>
    </div>

    <?php require_once '../layout/chat_button.php'; ?>

    <?php require_once '../layout/script.php'; ?>
    <script src="/dist/js/chat/group.js"></script>
</body>
</html>