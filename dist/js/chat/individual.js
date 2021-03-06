// ========== url ==========
const url_string = window.location.href;
const url = new URL(url_string);
const id = url.searchParams.get('id');

// ========== Auth Info ==========
const auth = JSON.parse(localStorage.getItem('auth'));

class UserAvailable{
    get(){
        // get user
        $.ajax({
            type: 'POST',
            url: '/server/chat/individual.php',
            data: {
                requestToGetUser: true,
                limit: 10,
            },
            success: (response) => {
                const result = JSON.parse(response);
                let user = '';
                console.log(result);
                
                if(result.user_list == false){
                    $('.card-body').html('<div class="d-flex align-items-center justify-content-center w-100 h-100"><p class="text-muted">Names will appear here</p></div>');
                    document.querySelector('.card-body').innerHTML = '<div class="d-flex align-items-center justify-content-center w-100 h-100"><p class="text-muted">Names will appear here</p></div>';
                }else{
                    result.user.forEach(res => {
                        user += /*html*/ `
                        <a class="d-flex alignt-items justify-content-start rounded-3 p-2 my-1 btn-names text-decoration-none" 
                        href='individual.php?id=${res.id}' style="text-transform: capitalize">
                            ${res.name}
                        </a>`;
                    });
                    $('.card-body').html(user);
                }
            }
        });
    }
}

class MessageArea{
    check_id(){
        $.ajax({
            type: 'POST',
            url: '/server/chat/individual.php',
            data: {
                requestToCheckUserId: true,
                id: id
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status == 'error') {
                    window.location.href = '/chat/individual.php';
                }
                const name = result.name;
                $('.card-header h4').append(name);
            }
        });
    }
    send_message(){
        const sendMessageForm = document.querySelector('form[name=sendMessageForm]');
        sendMessageForm.addEventListener('submit', (e) => {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/server/chat/individual.php',
                data: {
                    requestSendIndividualMessage: true,
                    to_id: id,
                    messageText: $('#inputMessageText').val(),
                },
                success: function() {
                    $('#inputMessageText').val(null);
                }
            });
        });
    }
    get_message(){
        const refreshChatBox = () => {
            $.ajax({
                type: 'POST',
                url: '/server/chat/individual.php',
                data: {
                    retrieveChatBoxIndividual: true,
                    id: id,
                },
                success: function(res) {
                    const result = JSON.parse(res);
                    console.log(res);
                    const card_body_text_area = $('#card-body-textarea');
                    let text = '';

                    if(result.chatAvailable == true){
                        result.chatBox.forEach(res => {
                            if (res.from == auth.id) {
                                text += /*html */`
                                <div class='d-flex justify-content-end'>
                                    <div class='p-1 bg-primary text-white rounded mb-1'>
                                        ${res.message}    
                                    </div>
                                </div>`;
                            } else {
                                text += /*html */`
                                <div class='d-flex justify-content-start'>
                                    <div class='p-1 text-black rounded mb-1' style="background-color: #F0FFFF">
                                        ${res.message}
                                    </div>
                                </div>`;
                            }
                        });
                        card_body_text_area.html(text);
                    }else{
                        card_body_text_area.html(`<div class="d-flex align-items-center justify-content-center w-100 h-100"><p class="text-muted">No conversations yet</p></div>`);
                    
                    }
                }
            });
        }
        refreshChatBox();
        setInterval(() => {
            refreshChatBox();
        }, 1000);
    }
    
}

class Search{
    user_available(params){
        const card_body = $('.card-body');

        $.ajax({
            type: 'POST',
            url: '/server/chat/individual.php',
            data: {
                searchToGetUser: true,
                limit: 10,
                name: params
            },
            beforeSend: () => {
                card_body.html(/*html */
                `<div class="d-flex align-items-center justify-content-center w-100 h-100">
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`);
            },
            success: function(response) {
                const result = JSON.parse(response);
                let user = '';
                result.forEach(res => {
                    user += /*html*/ `
                        <a class="d-flex alignt-items justify-content-start rounded-3 p-2 my-1 btn-names text-decoration-none" 
                            href='individual.php?id=${res.id}' style="text-transform: capitalize">
                            ${res.name}
                        </a>`;
                });
                card_body.html(user);
                if(result == ''){
                    card_body.html(/*html */
                    `<div class="d-flex align-items-center justify-content-center w-100 h-100">
                        <p class="text-muted">Not Found</p>
                    </div>`);
                }
            }
        });
    }
}

// ========== set class variable ==========
const user_available = new UserAvailable;
const search = new Search;
const message_area = new MessageArea;

// ========================================
const chat_individual_user_list = $('.chat_individual_user_list');
const chat_individual_message_area = $('.chat_individual_message_area');

const user_list_page = () => {
    const search_user = $('form[name=search_user]');
    const search_user_input = $('input[name=name]');
    
    user_available.get();
    
    search_user.submit(e => {
        e.preventDefault();
        search.user_available(search_user_input.val());
    });
}

const message_page = () => {
    message_area.check_id();
    message_area.send_message();
    message_area.get_message();
    
}

// ========== route ==========
if( id==null || id=='' ){
    user_list_page();
    chat_individual_message_area.remove();
}else{
    message_page();
    chat_individual_user_list.remove();
}