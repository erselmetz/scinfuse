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
        $('form[id=update_profile_form]').validate({
            errorClass: 'text-danger',
            validClass: 'text-success',
            rules: {
                profile_username: {
                    required: true,
                    minlength: 8,
                    maxlength: 50
                },
                profile_phone_number: {
                    required: true,
                    number: true
                }
            },
            submitHandler: (form) => {
                const username = form.username.value;
                const number = form.username.value;
                
                $.ajax({
                    type: "POST",
                    url: app.server("update/profile"),
                    data: {
                        update_profile: true,
                        username: username.value,
                        number: number.value
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
                        }else{
                            $('div[tag=content-profile-failed-to-update]').removeClass('d-none');
                        }
                    }
                });
            }
        });
    }
}

// ==================== new Email ====================
class Email{
    new_email(){
        $('form[name=new_email]').validate({
            errorClass: 'text-danger',
            validClass: 'text-success',
            rules:{
                new_email:{
                    required:true,
                    email: true
                }
            },
            submitHandler: (form) => {
                const email = form.email.value;
                const new_email = form.new_email.value;

                if( email.value != new_email.value ){
                    update();
                }

                function update(){
                    $.ajax({
                        type: "POST",
                        url: app.server("change/email"),
                        data: {
                            change_email: true,
                            new_email: new_email.value,
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
                                email.value = new_email.value;
                                new_email.value = null ;
                            }
                        }
                    });
                }
            }
        });
    }
}

// ==================== change password ====================
class ChangePassword{
    form(){
        $('form[name=change_password]').validate({
            rules: {
                old_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 8
                },
                repeat_new_password: {
                    required: true,
                    equalTo: '#new_password',
                }
            },
            errorClass: 'text-danger',
            validClass: 'text-success',
            submitHandler: (form) => {
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
                        old_password: form.old_password.value,
                        new_password: form.new_password.value,
                        repeat_new_password: form.repeat_new_password.value
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
                            old_password.val(null);
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
            }
        });
    }
}


const run = () => {
    // ==========================================================================================================
    const manage_account = new ManageAccount;
    const profile = new UpdateProfile;
    const email = new Email;
    const change_password = new ChangePassword;
    
    // form submit
    email.new_email();
    profile.update();
    change_password.form(); 

    // ==================== input:button ====================
    const iBtnProfile = $('input[name=btn_s_profile]');
    const iBtnEmail = $('input[name=btn_s_email]');
    const iBtnPassword = $('input[name=btn_s_password]');

    // addEventListener
    iBtnProfile.click( () => {
        manage_account.click_profile();
        $('form[id=update_profile_form]').submit()
    });
    iBtnEmail.click( () => {
        manage_account.click_email();
        $('form[name=new_email]').submit()
    });
    iBtnPassword.click( () => {
        manage_account.click_password();
        $('form[name=change_password]').submit();
    });
    
}