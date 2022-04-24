// get the url
const url_string = window.location.href;
const url = new URL(url_string);
const id = url.searchParams.get('id');

// AUTH INFO
const auth = JSON.parse(localStorage.getItem('auth'))

class Validate{
    url_id(){
        $.ajax({
            type: 'POST',
            url: '/server/chat/group.php',
            data: {
                groupIdIsset: true,
                id: id,
            },
            success: function(res){
                const result = JSON.parse(res);
                $('span[id=groupNameHere]').text(result.name+`  (${result.code})`);
                if(result.status == false){
                    window.location.href = "/chat/group.php";
                }
            }
        });       
    }
}

class Group{

    list(){
        $.ajax({
            type: 'POST',
            url: '/server/chat/group.php',
            data: {
                retrieveGroupList: true,
            },
            beforeSend: () => {
                $('.card-body').html(`
                <div class="loader-ring">Loading...
                    <span class="ring"></span>
                </div>`);
            },  
            success: function(response){
                const result = JSON.parse(response);
                console.log(result);
                let groupList = '';

                if(result.available == false){
                    $('.card-body').html('<h1 class="text-white">no conversation yet!!!</h1>');
                }else{
                    result.group_list.forEach( data =>{
                        groupList += `
                            <a class='d-flex justify-content-start btn btn-outline-secondary mb-2' href='group.php?id=`+data.id+`' id="groups">
                                <h5>`+data.name+`</h5><span class='tag' style="text-transform: capitalize">(`+data.group_status+`)</span>
                            </a>
                        `;
                    });
                    $('.card-body').html(groupList);
                }
            }
        });
    }

    send_message(){
        const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
        sendMessageForm.addEventListener('submit',(e) => {
            e.preventDefault();
            const messageText = document.querySelector('#inputMessageText'); 
            $.ajax({
                type: 'POST',
                url: '/server/chat/group.php',
                data: {
                    requestSendGroupMessage: true,
                    messageText: messageText.value,
                    gi: id
                },
                success: function(){
                    messageText.value = null;
                }
            });
        });
    }

    refresh_message(){
        function retrieveChatBox(params) {
            $.ajax({
                type: 'POST',
                url: '/server/chat/group.php',
                data: {
                    retrieveGroupMessage: true,
                    id: id,
                },
                success: function(response){
                    const result = JSON.parse(response);
                    let html = '';
                    $('#card-body-textarea').html('');
                    result.forEach(result => {
                        if(result.member_id == auth.id){
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
    }

    check_user_status(){
        // check if user is leader or member
        $.ajax({
            type: 'POST',
            url: '/server/chat/group.php',
            data: {
                userStatus: true,
                id: id,
            },
            success: function(response){
                const result = JSON.parse(response);
                let dropdown = '';
                let dropdownBtn = '';
                if(result.user == 'leader'){
                    dropdown += `
                    <a class='dropdown-item deleteGroup' href='#'>
                        Delete Group
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
                            id: id
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
                            id: id
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
    }
}

// classes
const validate = new Validate;
const group = new Group;

// variables
const Group_Message = $('.Group_Message');
const Group_List = $('.Group_List');

//check if id is not set
if(id == null || id == ''){
    group.list();
    Group_Message.remove();
}else{
    validate.url_id();

    Group_List.remove();
    
    group.send_message();
    group.refresh_message();
    group.check_user_status();
}