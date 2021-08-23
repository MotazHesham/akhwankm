<?php   

Route::group(['prefix' => 'smallbrother', 'as' => 'smallbrother.', 'namespace' => 'Smallbrother', 'middleware' => ['auth','smallbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
    Route::get('/show/Mybrother/{user_id}', 'SmallBrotherController@MyBrother')->name('brotherhood.show'); 
    Route::get('/edit/{user_id}', 'SmallBrotherController@edit')->name('edit'); 
    Route::PUT('/update/{user_id}', 'SmallBrotherController@update')->name('update'); 
    Route::get('/outings/{user_id}', 'SmallBrotherController@outing')->name('outingRequest'); 
    Route::get('/datingSession/{user_id}', 'SmallBrotherController@datingSession')->name('datingSession'); 
    
    // calender 
    Route::get('calender','HomeController@calender')->name('calender');
    
}); 