<?php   

Route::group(['prefix' => 'smallbrother', 'as' => 'smallbrother.', 'namespace' => 'Smallbrother', 'middleware' => ['auth','smallbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
    Route::get('/show/Mybrother', 'SmallBrotherController@MyBrother')->name('brotherhood.show'); 
    Route::get('/edit', 'SmallBrotherController@edit')->name('edit'); 
    Route::PUT('/update', 'SmallBrotherController@update')->name('update'); 
    Route::get('/outings', 'SmallBrotherController@outing')->name('outingRequest'); 
    Route::get('/datingSession', 'SmallBrotherController@datingSession')->name('datingSession'); 
    
    //my information
    Route::get('my-info', 'SmallBrotherController@edit')->name('edit-info');
    Route::post('my-info', 'SmallBrotherController@update')->name('update-info');

    // calender 
    Route::get('calender','HomeController@calender')->name('calender');
    
}); 