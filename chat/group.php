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

    <?php if(isset($_GET['id'])){ ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-8 h-75">
                <div class="card-header d-flex justify-content-between">
                    <a type="button" class="btn btn-primary" href="group.php">&lt;</a>
                    <div class="dropdown">
                        <button class="btn btn-primary" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            &vellip;
                        </button>
                        <div class="dropdown-menu" id="moreOptionHeader" aria-labelledby="triggerId"></div>
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
        <script src="/dist/js/jquery.js"></script>
        <script>
            // send message
            const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
            sendMessageForm.addEventListener('submit',(e) => {
                e.preventDefault();
                const messageText = document.querySelector('#inputMessageText'); 
                $.ajax({
                    type: 'POST',
                    url: '/server/chat/group.php',
                    data: {
                        requestSendGroupMessage: true,
                        token: '<?php echo $auth->token() ?>',
                        messageText: messageText.value,
                        gi: '<?php echo $_GET['id'] ?>'
                    },
                    success: function(){
                        messageText.value = null;
                    }
                });
            });
            // refresh message box
            function retrieveChatBox(params) {
                $.ajax({
                    type: 'POST',
                    url: '/server/chat/group.php',
                    data: {
                        retrieveGroupMessage: true,
                        id: '<?php echo $_GET['id'] ?>',
                        token: '<?php echo $auth->token() ?>'
                    },
                    success: function(response){
                        const result = JSON.parse(response);
                        let html = '';
                        result.forEach(result => {
                            if(result.member_id == '<?php echo $auth->id() ?>'){
                                html += `
                                <div class='d-flex justify-content-end'>
                                    <div class='p-1 bg-primary text-white rounded mb-1'>
                                        `+result.message+`     
                                    </div>
                                </div>`;
                            }else{
                                html += `
                                <div class='d-flex justify-content-start'>
                                    <div class='p-1 bg-primary text-white rounded mb-1'>
                                        `+result.member_name+`:`+result.message+`   
                                    </div>
                                </div>`;
                            }
                        })
                        $('#card-body-textarea').html(html);
                    }
                });
            }
            retrieveChatBox();
            setInterval(() => {
                retrieveChatBox();
            }, 1000);
            $.ajax({
                type: 'POST',
                url: '/server/chat/group.php',
                data: {
                    groupIdIsset: true,
                    id: '<?php echo $_GET['id'] ?>',
                    token: '<?php echo $auth->token() ?>'
                },
                success: function(res){
                    const result = JSON.parse(res);
                    if(result.status == false){
                        window.location.href = "/chat/group.php";
                    }
                }
            });
            // check if user is leader or member
            $.ajax({
                type: 'POST',
                url: '/server/chat/group.php',
                data: {
                    userStatus: true,
                    id: '<?php echo $_GET['id'] ?>',
                    token: '<?php echo $auth->token() ?>'
                },
                success: function(response){
                    const result = JSON.parse(response);
                    let dropdown = '';
                    let dropdownBtn = '';
                    if(result.user == 'leader'){
                        dropdown += `
                        <a class='dropdown-item deleteGroup' href='#'>
                            DELETE Group
                        </a>`;
                        dropdownBtn += `
                            
                        `;
                    }else if(result.user == 'member'){
                        dropdown += `
                        <a class='dropdown-item leaveGroup' href='#'>
                            Leave Group
                        </a>`;
                    }
                    $('#moreOptionHeader').html(dropdown);

                    // delete group for admin/leader only
                    $('.deleteGroup').on('click',function(){
                        $.ajax({
                            type: 'POST',
                            url: '/server/chat/group.php',
                            data: {
                                requestDeleteGroup: true,
                                token: '<?php echo $auth->token() ?>',
                                id: '<?php echo $_GET['id'] ?>'
                            },
                            success: function(response){
                                const result = JSON.parse(response);
                                if(result.status == 'success'){
                                    window.location.href = '/chat/group.php';
                                }
                            }
                        });
                    });
                    // leave group for member only
                    $('.leaveGroup').on('click',function(){
                        $.ajax({
                            type: 'POST',
                            url: '/server/chat/group.php',
                            data: {
                                requestLeaveGroup: true,
                                token: '<?php echo $auth->token() ?>',
                                id: '<?php echo $_GET['id'] ?>'
                            },
                            success: function(response){
                                if(response == 'success'){
                                    window.location.href = '/chat/group.php';
                                }
                            }
                        });
                    });
                }
            });
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
                </div>
            </div>
        </div>
        <script src="/dist/js/jquery.js"></script>
        <script>
            $.ajax({
                type: 'POST',
                url: '/server/chat/group.php',
                data: {
                    retrieveGroupList: true,
                    token: '<?php echo $auth->token() ?>'
                },
                success: function(response){
                    const result = JSON.parse(response);
                    console.log(result);
                    let groupList = '';
                    result.forEach( data =>{
                        groupList += `
                            <a class='d-flex justify-content-start btn btn-outline-secondary mb-2' href='group.php?id=`+data.id+`'>
                                <h5>`+data.name+`</h5><span class='tag'>(`+data.group_status+`)</span>
                            </a>
                        `;
                    });
                    $('.card-body').append(groupList);
                }
            });
        </script>
    <?php } ?>
    <script src="/dist/js/bootstrap.js"></script>
</body>
</html>