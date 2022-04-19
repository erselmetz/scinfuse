<?php

Route::make('/login',[Controller::class, 'login']);
Route::make('/register',[Controller::class, 'register']);
Route::make('/validate',[Controller::class, 'validate']);
Route::make('/forgot/password',[Controller::class, 'forgot_password']);

App::authenticated(function(){
    
    Route::make('/chat/individual/retrieve/message',[Chat::class, 'individual_retrieve_chat_box']);
    Route::make('/chat/global/retrieve/message',[Chat::class, 'global_retrieve_chat_box']);
    Route::make('/chat/group/retrieve/message',[Chat::class, 'group_retrieve_chat_box']);

    Route::make('/chat/individual/send/message',[Chat::class, 'individual_send_message']);
    Route::make('/chat/global/send/message',[Chat::class, 'global_send_message']);
    Route::make('/chat/group/send/message',[Chat::class, 'group_send_message']);

    Route::make('/chat/group/validate',[Chat::class, 'group_id_exists']);
    Route::make('/chat/group/list',[Chat::class, 'group_list']);
    Route::make('/chat/group/user/status',[Chat::class, 'group_user_status']);
    Route::make('/chat/group/delete',[Chat::class, 'group_delete']);
    Route::make('/chat/group/leave',[Chat::class, 'group_leave']);

    Route::make('/chat/individual/get/user',[Chat::class, 'individual_get_user']);
    Route::make('/chat/individual/validate/user',[Chat::class, 'individual_validate_user']);
    Route::make('/chat/individual/search/user',[Chat::class, 'individual_search_user']);

    // USER INFO
    Route::make('/user/info',[User::class, 'user_info']);

    Route::make('/update/profile',[User::class, 'update_profile']);
    Route::make('/change/password',[User::class, 'change_password']);
    Route::make('/change/email',[User::class, 'change_email']);
    Route::make('/logout',[Controller::class, 'logout']);
    
});


Route::execute();
// Route::make('/',[::class, '']);