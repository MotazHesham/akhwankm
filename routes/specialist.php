<?php   

Route::group(['prefix' => 'specialist', 'as' => 'specialist.', 'namespace' => 'Specialist', 'middleware' => ['auth','specialist']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
    Route::get('/allBrother', 'SpecialistController@allBrothers')->name('brothers'); 
    Route::get('/brother/details/{big_brother_id}', 'SpecialistController@brother_detials')->name('brother_details'); 
    Route::get('/brotherhood_process/{big_brother_id}', 'SpecialistController@brotherhood')->name('process'); 
    Route::post('/approve/store', 'SpecialistController@approvement')->name('approvement-forms.store'); 

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
}); 