<?php   

Route::group(['prefix' => 'specialist', 'as' => 'specialist.', 'namespace' => 'specialist', 'middleware' => ['auth','specialist']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
    Route::get('/allBrother', 'specialistController@allBrothers')->name('brothers'); 
    Route::get('/brother/details/{big_brother_id}', 'specialistController@brother_detials')->name('brother_details'); 
    Route::get('/brotherhood_process/{big_brother_id}', 'specialistController@brotherhood')->name('process'); 
    Route::post('/approve/store', 'specialistController@approvement')->name('approvement-forms.store'); 

    //dating_session
    Route::get('/session/{id}', 'DatingSessionController@create')->name('session'); 

    Route::Post('/session/store', 'DatingSessionController@store')->name('session_store'); 

    //brotherhood
//    Route::get('/brotherhood/{id}', 'BrotherhoodController@create')->name('brotherhood_create'); 
    Route::post('/brotherhood/store', 'BrotherhoodController@store')->name('choose_smallbrother'); 

    //deal_form
    Route::post('/brothers-deal-forms/store', 'BrotherDealControllers@store')->name('brothers-deal-forms.store'); 
    
   
  
}); 