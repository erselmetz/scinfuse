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

    <!-- style link -->
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>

    <?php require_once '../layout/navbar.php'; ?>
    
    <?php if(isset($_GET['id'])){ ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-11 h-75">
                <div class="card-header">
                    <h4>
                        <a class="text-decoration-none" href="/chat/individual.php">&lt;</a>
                    </h4>
                </div>
                <div class="card-body overflow-auto">
                    <!-- textarea -->
                    <div id="card-body-textarea" class="w-100"></div>
                </div>
                <div class="card-footer">
                    <form name="sendMessageForm">
                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div class="form-floating">
                                    <input id="inputMessageText" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                                    <label for="floatingTextarea">Send message</label>
                                </div>
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-primary h-100 w-100" value="send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="/dist/js/jquery.js"></script>
        <script>
            // check id
            $.ajax({
                type: 'POST',
                url: '/server/chat/individual.php',
                data: {
                    requestToCheckUserId: true,
                    token: '<?php echo $auth->token() ?>',
                    id: '<?php echo $_GET['id'] ?>'
                },
                success: function(response){
                    const result = JSON.parse(response);
                    console.log(response);
                    if(result.status == 'error'){
                        window.location.href = '/chat/individual.php';
                    }
                    const name = result.name;
                    $('.card-header h4').append(name);
                }
            });
            // send message
            const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
            sendMessageForm.addEventListener('submit',(e) => {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/server/chat/individual.php',
                    data: {
                        requestSendIndividualMessage: true,
                        token: '<?php echo $auth->token() ?>',
                        to_id: '<?php echo $_GET['id'] ?>',
                        messageText: $('#inputMessageText').val(),
                    },
                    success: function(){
                        $('#inputMessageText').val(null);
                    }
                });
            });
            // refresh message box
            function refreshChatBox(params) {
                $.ajax({
                    type: 'POST',
                    url: '/server/chat/individual.php',
                    data: {
                        retrieveChatBoxIndividual: true,
                        token: '<?php echo $auth->token() ?>',
                        id: '<?php echo $_GET['id'] ?>',
                    },
                    success: function(res){
                        const result = JSON.parse(res);
                        let text = '';

                        result.forEach( res => {
                            if(res.from == <?php echo $auth->id() ?>){
                                text += `
                                <div class='d-flex justify-content-end'>
                                    <div class='p-1 bg-primary text-white rounded mb-1'>
                                        `+res.message+`    
                                    </div>
                                </div>
                                `;
                            }else{
                                text += `
                                <div class='d-flex justify-content-start'>
                                    <div class='p-1 bg-primary text-white rounded mb-1'>
                                        `+res.message+`
                                    </div>
                                </div>
                                `;
                            }
                        });
                        $('#card-body-textarea').html(text);
                    }
                });
            }
            refreshChatBox();
            setInterval(() => {
                refreshChatBox();
            }, 1000);
        </script>
        <?php 
        // =================================================================================================
        ?>
    <?php }else{ ?>

        <div class='d-flex justify-content-center align-items-center vh-100'>
            <div class='card col-12 col-md-11 h-75'>
                <div class='card-body overflow-auto'></div>
            </div>
        </div>
        <script src="/dist/js/jquery.js"></script>
        <script>
            // get user
            $.ajax({
                type: 'POST',
                url: '/server/chat/individual.php',
                data: {
                    requestToGetUser: true,
                    token: '<?php echo $auth->token() ?>'
                },
                success: function(response){
                    const result = JSON.parse(response);
                    let user = '';
                    result.forEach( res => {
                        user += `<a href='individual.php?id=`+res.id+`'>`+res.name+`</a><br>`;
                    });
                    $('.card-body').html(user);
                }
            });
            
        </script>

    <?php } ?>

    <script src="/dist/js/bootstrap.js"></script>
</body>
</html>