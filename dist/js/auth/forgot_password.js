// current url
const url_string = window.location.href;
const url = new URL(url_string);
const parameter_u = url.searchParams.get('u');
const parameter_p = url.searchParams.get('p');

// forgot password email form
const forgot_password_email_form = $('.forgot_password');
const enter_new_password = $('.enter_new_password');
// input email submited
$('form[name=forgot_password]').submit(function(e){
    const email = $('input[name=email]');
    const emailResponse = $('#emailResponse');
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/server/auth/forgot_password.php',
        data: {
            forgotPassword: true,
            email: email.val()
        },
        beforeSend: function(){
            const spinner = `
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            `;
            emailResponse.html(spinner);
        },
        success: function(res){
            const result = JSON.parse(res);
            email.val(null);
            
            emailjs.send("service_bi1h94n","template_z3rm6ub",{
                to_name: result.name,
                username: result.username,
                password: result.password,
                send_to: result.email_to,
            }).then(response => {
                emailResponse.text('Message sent!!');
            }); 
        }
    });
});

// check if u and p parameter is true
if(parameter_u != null && parameter_p != null){
    $.ajax({
        type: 'POST',
        url: '/server/auth/forgot_password.php',
        data: {
            uAndPparameter: true,
            u: parameter_u,
            p: parameter_p
        },
        success: function(res){
            const result = JSON.parse(res);
            if(result.status == false){
                history.back();
            }else if(result.status == true){
                forgot_password_email_form.addClass('d-none');
                enter_new_password.removeClass('d-none');
            }
        }
    });
}else{
    forgot_password_email_form.removeClass('d-none');
}

// if form is submit
$('form[name=change_password]').submit(function(e){
    e.preventDefault();

    const new_password = $('input[name=new_password]');
    const repeat_new_password = $('input[name=repeat_new_password]');
    const match_error = $('.match_error');
    const alert_success = $('.alert_success');
    const loader = $('.loader');

    $.ajax({
        type: 'POST',
        url: '/server/auth/forgot_password.php',
        data: {
            change_password_from_forgot_password: true,
            u: parameter_u,
            p: parameter_p,
            new_password: new_password.val(),
            repeat_new_password: repeat_new_password.val()
        },
        beforeSend: function(){
            loader.removeClass('d-none');
        },
        success: function(res){
            const result = JSON.parse(res);
            console.log(result);

            loader.addClass('d-none');

            match_error.addClass('d-none');  
            new_password.removeClass('border border-danger');
            repeat_new_password.removeClass('border border-danger');

            if(result.new_password != result.repeat_new_password){
                match_error.removeClass('d-none');
                new_password.addClass('border border-danger');
                repeat_new_password.addClass('border border-danger');
            }else{
                match_error.addClass('d-none');
                new_password.removeClass('border border-danger');
                repeat_new_password.removeClass('border border-danger');
            }

            if(result.status == true){
                new_password.val(null);
                repeat_new_password.val(null);
                alert_success.removeClass('d-none');
                window.location.href = '/';
            }
        }
    });
                
});