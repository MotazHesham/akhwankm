<?php

Route::group(['prefix' => 'smallbrother', 'as' => 'smallbrother.', 'namespace' => 'Smallbrother', 'middleware' => ['auth','smallbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Chatting
    Route::get('/chatting','ConversationsController@index')->name('chatting.index');
    Route::post('/chatting/show','ConversationsController@show')->name('chatting.show');
    Route::post('/chatting/send','ConversationsController@send')->name('chatting.send');
    Route::post('/chatting/refresh_contacts','ConversationsController@index')->name('chatting.refresh_contacts');

    Route::get('/show/Mybrother', 'SmallBrotherController@MyBrother')->name('brotherhood.show');
    Route::get('/edit', 'SmallBrotherController@edit')->name('edit');
    Route::PUT('/update', 'SmallBrotherController@update')->name('update');
    Route::get('/outings', 'SmallBrotherController@outing')->name('outingRequest');
    Route::get('/datingSession', 'SmallBrotherController@datingSession')->name('datingSession');

    // Small Brother Rating
Route::delete('small-brother-ratings/destroy', 'SmallBrotherRatingController@massDestroy')->name('small-brother-ratings.massDestroy');
Route::resource('small-brother-ratings', 'SmallBrotherRatingController');


    //my information
    Route::get('my-info', 'SmallBrotherController@edit')->name('edit-info');
    Route::post('my-info', 'SmallBrotherController@update')->name('update-info');

    // calender
    Route::get('calender','HomeController@calender')->name('calender');

    // Inequality
    Route::delete('inequalities/destroy', 'InequalityController@massDestroy')->name('inequalities.massDestroy');
    Route::resource('inequalities', 'InequalityController');

});
