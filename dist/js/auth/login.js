const alert_u = $('.alert_username');
const alert_p = $('.alert_password');
const loader = $('.loader');
$('form[name=login]').submit(function(e){
    e.preventDefault();
    const username = $('input[name=username]');
    const password = $('input[name=password]');
    $.ajax({
        type: 'POST',
        url: '/server/auth/login.php',
        data: {
            u: username.val(),
            p: password.val()
        },
        beforeSend: function(){
            loader.removeClass('d-none');
        },
        success: function(response){
            loader.addClass('d-none');
            const res = JSON.parse(response);
            console.log(res);
            if(res.email == false ){
                // username or email not found
                alert_u.removeClass('d-none');
                alert_p.addClass('d-none');
            }else if(res.email == true){
                if(res.password == false){
                    // password does not match our cresidentials
                    alert_u.addClass('d-none');
                    alert_p.removeClass('d-none');
                    password.val(null);
                    password.focus();
                }
            }

            if(res.status == true){
                window.location.href = '/home.php';
                const auth = {
                    username: res.auth_username,
                    password: res.auth_password,
                    id: res.auth_id
                };
                localStorage.setItem('auth',JSON.stringify(auth));
            }
        }
    });
});