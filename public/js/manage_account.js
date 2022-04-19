import { app, auth } from "./app.js";

export const manage_account_area = () => {
    auth.validate();
    app.navbar();
    app.view('manage_account',() => {
        run();
    });
}

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
        this.iBtnProfile.removeClass('button btn-manage1');
        this.iBtnEmail.addClass('button btn-manage1');
        this.iBtnPassword.addClass('button btn-manage1');
            // btn primary
        this.iBtnProfile.addClass('btn-manage');
        this.iBtnEmail.removeClass('btn-manage');
        this.iBtnPassword.removeClass('btn-manage');
    }
    click_email(){
        this.cProfile.addClass('d-none');
        this.cEmail.removeClass('d-none');
        this.cPassword.addClass('d-none');

        // button shades
            // btn light
        this.iBtnProfile.addClass('button btn-manage1');
        this.iBtnEmail.removeClass('button btn-manage1');
        this.iBtnPassword.addClass('button btn-manage1');
            // btn primary
        this.iBtnProfile.removeClass('btn-manage');
        this.iBtnEmail.addClass('btn-manage');
        this.iBtnPassword.removeClass('btn-manage');
    }
    click_password(){
        this.cProfile.addClass('d-none');
        this.cEmail.addClass('d-none');
        this.cPassword.removeClass('d-none');

        // button shades
            // btn light
        this.iBtnProfile.addClass('button btn-manage1');
        this.iBtnEmail.addClass('button btn-manage1');
        this.iBtnPassword.removeClass('button btn-manage1');
            // btn primary
        this.iBtnProfile.removeClass('btn-manage');
        this.iBtnEmail.removeClass('btn-manage');
        this.iBtnPassword.addClass('btn-manage');
    }
}

// ==================== Update Profile Form ====================
class UpdateProfile{
    update(){
        const username = $('input[name=profile_username]');
        const number = $('input[name=profile_phone_number]');
        
        $.ajax({
            type: "POST",
            url: "/server/manage_account.php",
            data: {
                update_profile: true,
                username: username.val(),
                number: number.val()
            },
            beforeSend: function(){
                $('.loader').removeClass('d-none');
                $('.check-fill-up').addClass('d-none');
            },
            success: response => {
                $('.loader').addClass('d-none');
                const res = JSON.parse(response);

                if(res.status == true){
                    $('.check-fill-up').removeClass('d-none');
                }
            }
        });
    }
}

// ==================== new Email ====================
class Email{
    new_email(){
        const email = $('input[name=email]');
        const new_email = $('input[name=new_email]');

        if( email.val() != new_email.val() ){
            update();
        }

        function update(){
            $.ajax({
                type: "POST",
                url: "/server/manage_account.php",
                data: {
                    change_email: true,
                    new_email: new_email.val(),
                },
                beforeSend: () => {
                    $('.check-fill-ne').addClass('d-none');
                    $('.loader').removeClass('d-none');
                },
                success: response => {
                    $('.loader').addClass('d-none');
                    const res = JSON.parse(response);

                    if(res.email_changed == true){
                        $('.check-fill-ne').removeClass('d-none');
                        email.val(new_email.val());
                        new_email.val(null);
                    }
                }
            });
        }
    }
}

// ==================== change password ====================
class ChangePassword{
    constructor(){
        this.form();
    }
    form(){
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
                url: app.server("change/password"),
                data: {
                    submit_change_password: true,
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
                        window.location.href = '/';
                    }
                }
            });
                        
        });
    }
}

// ==========================================================================================================
const manage_account = new ManageAccount;
const profile = new UpdateProfile;
const email = new Email;
const change_password = new ChangePassword;

const run = () => {
    // ==================== input:button ====================
    const iBtnProfile = $('input[name=btn_s_profile]');
    const iBtnEmail = $('input[name=btn_s_email]');
    const iBtnPassword = $('input[name=btn_s_password]');

    // ==================== form button ====================
    const updateProfileForm = $('#update_profile_form');
    const new_email_form = $('form[name=new_email]');

    // addEventListener
    iBtnProfile.click( () => {
        manage_account.click_profile();
    });
    iBtnEmail.click( () => {
        manage_account.click_email();
    });
    iBtnPassword.click( () => {
        manage_account.click_password();
    });

    // ==================== forms submit ====================
    updateProfileForm.submit( e => {
        e.preventDefault();
        profile.update();
    });
    new_email_form.submit( e => {
        e.preventDefault();
        email.new_email();
    });
}