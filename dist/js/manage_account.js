class ManageAccount{
    constructor(){
        // input:button
        this.iBtnProfile = $('input[name=btn_s_profile]');
        this.iBtnEmail = $('input[name=btn_s_email]');
        this.iBtnPassword = $('input[name=btn_s_password]');
        // content
        this.cProfile = $('.c_profile');
        this.cEmail = $('.c_email');
        this.cPassword = $('.c_password');
        this.click_profile();
    }
    click_profile(){
        this.cProfile.removeClass('d-none');
        this.cEmail.addClass('d-none');
        this.cPassword.addClass('d-none');

        // button shades
            // btn light
        this.iBtnProfile.removeClass('btn-light');
        this.iBtnEmail.addClass('btn-light');
        this.iBtnPassword.addClass('btn-light');
            // btn primary
        this.iBtnProfile.addClass('btn-primary');
        this.iBtnEmail.removeClass('btn-primary');
        this.iBtnPassword.removeClass('btn-primary');
    }
    click_email(){
        this.cProfile.addClass('d-none');
        this.cEmail.removeClass('d-none');
        this.cPassword.addClass('d-none');

        // button shades
            // btn light
        this.iBtnProfile.addClass('btn-light');
        this.iBtnEmail.removeClass('btn-light');
        this.iBtnPassword.addClass('btn-light');
            // btn primary
        this.iBtnProfile.removeClass('btn-primary');
        this.iBtnEmail.addClass('btn-primary');
        this.iBtnPassword.removeClass('btn-primary');
    }
    click_password(){
        this.cProfile.addClass('d-none');
        this.cEmail.addClass('d-none');
        this.cPassword.removeClass('d-none');

        // button shades
            // btn light
        this.iBtnProfile.addClass('btn-light');
        this.iBtnEmail.addClass('btn-light');
        this.iBtnPassword.removeClass('btn-light');
            // btn primary
        this.iBtnProfile.removeClass('btn-primary');
        this.iBtnEmail.removeClass('btn-primary');
        this.iBtnPassword.addClass('btn-primary');
    }
}

class ChangePassword{
    constructor(){
        this.auth = JSON.parse(localStorage.getItem('auth'));
        this.parameter_u = this.auth.username;
        this.parameter_p = this.auth.password;
        this.form();
    }
    check_auth_user(){
        $.ajax({
            type: 'POST',
            url: '/server/manage_account.php',
            data: {
                uAndPparameter: true,
                u: this.parameter_u,
                p: this.parameter_p
            },
            success: function(res){
                const result = JSON.parse(res);
                if(result.status == false){
                    history.back();
                }
            }
        });
    }
    form(){
        const parameter_u = this.parameter_u;
        const parameter_p = this.parameter_p;
        $('form[name=change_password]').submit(function(e){
            e.preventDefault();
            const old_password = $('input[name=old_password]');
            const new_password = $('input[name=new_password]');
            const repeat_new_password = $('input[name=repeat_new_password]');
        
            const match_error = $('.match_error');
            const old_password_error = $('.old_password_error');
            const alert_success = $('.alert_success');
        
            const loader = $('.loader');
        
            $.ajax({
                type: 'POST',
                url: '/server/manage_account.php',
                data: {
                    submit_change_password: true,
                    u: parameter_u,
                    p: parameter_p,
                    old_password: old_password.val(),
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
                    
                    if(result.old_password == false){
                        old_password.addClass('border border-danger');
                        old_password_error.removeClass('d-none');
                    }else{
                        old_password.removeClass('border border-danger');
                        old_password_error.addClass('d-none');   
                    }
        
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
                        old_password.val(null);
                        new_password.val(null);
                        repeat_new_password.val(null);
                        alert_success.removeClass('d-none');
                    }
                }
            });
                        
        });
    }
}

const manage_account = new ManageAccount;
const change_password = new ChangePassword;

// input:button
const iBtnProfile = $('input[name=btn_s_profile]');
const iBtnEmail = $('input[name=btn_s_email]');
const iBtnPassword = $('input[name=btn_s_password]');

// addEventListener
iBtnProfile.click(function(){
    manage_account.click_profile();
});
iBtnEmail.click(function(){
    manage_account.click_email();
});
iBtnPassword.click(function(){
    manage_account.click_password();
    change_password.check_auth_user();
});