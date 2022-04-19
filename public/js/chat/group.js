import { app, auth } from "../app.js";

export const chat_group_area = () => {
    auth.validate();
    app.navbar();
    app.chats_button();
    app.view('chat/global',() => {
        run();
    });
}

// get the url
const url_string = window.location.href;
const url = new URL(url_string);
const id = url.searchParams.get('id');

class Group{

    url_id(){
        $.ajax({
            type: 'POST',
            url: app.server("chat/group/validate"),
            data: {
                groupIdIsset: true,
                id: id,
            },
            success: function(res){
                const result = JSON.parse(res);
                if(result.status == false){
                    window.location.href = "/chat/group";
                }
            }
        });       
    }

    list(){
        $.ajax({
            type: 'POST',
            url: app.server("chat/group/list"),
            data: {
                retrieveGroupList: true,
            },
            success: function(response){
                const result = JSON.parse(response);
                let groupList = '';
                result.forEach( data =>{
                    groupList += `
                        <a class='d-flex justify-content-start btn btn-outline-secondary mb-2' href='group.php?id=`+data.id+`' id="groups">
                            <h5>`+data.name+`</h5><span class='tag' style="text-transform: capitalize">(`+data.group_status+`)</span>
                        </a>
                    `;
                });
                $('.card-body').html(groupList);
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
                url: app.server("chat/group/send/message"),
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
                url: app.server("chat/group/retrieve/message"),
                data: {
                    retrieveGroupMessage: true,
                    id: id,
                },
                success: function(response){
                    const result = JSON.parse(response);
                    let html = '';
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
            url: app.server("chat/group/user/status"),
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
                        url: app.server("chat/group/delete"),
                        data: {
                            requestDeleteGroup: true,
                            id: id
                        },
                        success: function(response){
                            const result = JSON.parse(response);
                            if(result.status == 'success'){
                                window.location.href = '/chat/group';
                            }
                        }
                    });
                });
                // leave group for member only
                $('.leaveGroup').on('click',function(){
                    $.ajax({
                        type: 'POST',
                        url: app.server("chat/group/leave"),
                        data: {
                            requestLeaveGroup: true,
                            id: id
                        },
                        success: function(response){
                            if(response == 'success'){
                                window.location.href = '/chat/group';
                            }
                        }
                    });
                });
            }
        });
    }
}

const run = () => {
    // classes
    const group = new Group;

    // variables
    const Group_Message = $('.Group_Message');
    const Group_List = $('.Group_List');

    //check if id is not set
    if(id == null || id == ''){
        group.list();
        Group_Message.remove();
    }else{
        group.url_id();

        Group_List.remove();
        
        group.send_message();
        group.refresh_message();
        group.check_user_status();
    }
}