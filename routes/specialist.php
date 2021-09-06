<?php   

Route::group(['prefix' => 'specialist', 'as' => 'specialist.', 'namespace' => 'Specialist', 'middleware' => ['auth','specialist']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
    
    // Chatting
    Route::get('/chatting','ConversationsController@index')->name('chatting.index');
    Route::post('/chatting/show','ConversationsController@show')->name('chatting.show');
    Route::post('/chatting/send','ConversationsController@send')->name('chatting.send');
    Route::post('/chatting/refresh_contacts','ConversationsController@index')->name('chatting.refresh_contacts');

    Route::get('/allBrother', 'SpecialistController@allBrothers')->name('brothers'); 
    Route::get('/brother/details/{big_brother_id}', 'SpecialistController@brother_detials')->name('brother_details'); 
    Route::get('/brotherhood_process/{big_brother_id}', 'SpecialistController@brotherhood')->name('process'); 
    Route::post('/approve/store', 'SpecialistController@approvement')->name('approvement-forms.store'); 
    Route::get('approvement-forms/printForm/{approvementForm}','SpecialistController@printApprovementForm')->name('approvement-forms.print');

    // dating_session
    Route::get('/session/{id}', 'DatingSessionController@create')->name('session');  
    Route::Post('/session/store', 'DatingSessionController@store')->name('session_store'); 

    // outing requests 
    Route::get('/outing-requests','OutingRequestsController@index')->name('outing-requests.index');
    Route::get('/outing-requests/{id}/{status}','OutingRequestsController@change_status')->name('outing-requests.change_status');

    // brotherhood 
    Route::post('/brotherhood/store', 'BrotherhoodController@store')->name('choose_smallbrother'); 

    // deal_form
    Route::post('/brothers-deal-forms/store', 'BrotherDealControllers@store')->name('brothers-deal-forms.store'); 
    
   // Inequality
    Route::delete('inequalities/destroy', 'InequalityController@massDestroy')->name('inequalities.massDestroy');
    Route::resource('inequalities', 'InequalityController');
    Route::get('inequalities/print/{id}', 'InequalityController@print_form')->name('inequalities.print');


    // Follow Up
    Route::delete('follow-ups/destroy', 'FollowUpController@massDestroy')->name('follow-ups.massDestroy');
    Route::get('follow-ups/index', 'FollowUpController@index')->name('follow-ups.index'); 
    Route::get('follow-ups/create/{id}', 'FollowUpController@create')->name('follow-ups.create'); 
    Route::post('follow-ups/store', 'FollowUpController@store')->name('follow-ups.store'); 
    Route::get('follow-ups/edit/{id}', 'FollowUpController@edit')->name('follow-ups.edit');
    Route::Put('follow-ups/update', 'FollowUpController@update')->name('follow-ups.update');
   
   // Challengetype
    Route::delete('challengetypes/destroy', 'ChallengetypeController@massDestroy')->name('challengetypes.massDestroy');
    Route::resource('challengetypes', 'ChallengetypeController');
   
   // Challenges
   Route::delete('challenges/destroy', 'ChallengesController@massDestroy')->name('challenges.massDestroy');
   Route::resource('challenges', 'ChallengesController'); 
       
}); 