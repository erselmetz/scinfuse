class GlobalChat{
    run(){
        const sendMessageForm = $('form[name=sendMessageForm]');
        sendMessageForm.submit((e) => {
            e.preventDefault();
            const messageText = $('#inputMessageText');

            $.ajax({
                type: 'POST',
                url: '/server/chat/global.php',
                data: {
                    requestSendGlobalMessage: true,
                    messageText: messageText.val()
                },
                success: function(response){
                    const res = JSON.parse(response);
                    messageText.val(null);
                    console.log(res);
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
                success: function(response){
                    const res = JSON.parse(response).reverse();
                    const body_text = $('.card-body-textarea');
                    let html_text = '';

                    res.forEach(data => {
                        html_text += /*html*/
                        `<div class="my-2">
                            <label class="rounded-3 bg-light p-1">${data['name']} :</label>
                            <div class="d-flex align-items-center justify-content-start rounded-3 bg-info bg-gradient p-2 w-100">
                                <div class="mx-1 text-break">
                                    ${data['message']}
                                </div>
                            </div>
                        </div>`;
                    });
                    body_text.html(html_text);
                }
            });
        }
        retrieveChatBox();
        const body = $(".card-body-textarea");
        setInterval(() => {
            retrieveChatBox();
            body.scrollTop(body[0].scrollHeight);
        }, 500);
        body.scrollTop(body[0].scrollHeight);
    }
}

const chat_global = new GlobalChat;
chat_global.run();