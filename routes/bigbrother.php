<?php

Route::group(['prefix' => 'bigbrother', 'as' => 'bigbrother.', 'namespace' => 'Bigbrother', 'middleware' => ['auth','bigbrother']], function () {

    Route::get('/', 'HomeController@index')->name('home');


    // Chatting
    Route::get('/chatting','ConversationsController@index')->name('chatting.index');
    Route::post('/chatting/show','ConversationsController@show')->name('chatting.show');
    Route::post('/chatting/send','ConversationsController@send')->name('chatting.send');
    Route::post('/chatting/refresh_contacts','ConversationsController@index')->name('chatting.refresh_contacts');
    
    //Brothers Deal Form
    Route::get('brothers-deal-forms/printForm','BrothersDealFormController@printForm')->name('brothers-deal-forms.print');
    Route::get('brothers-deal-forms/view','BrothersDealFormController@view')->name('brothers-deal-forms.view');

    Route::get('brothers-deal-forms-index', 'BrothersDealFormController@index')->name('BDFI');
    Route::get('brothers-deal-forms-show', 'BrothersDealFormController@show')->name('BDFShow');
    //Promise Form
    Route::get('brothers-promise-forms-view', 'BrothersPromiseFormController@view')->name('BrothersPromiseForm.view');
    Route::get('brothers-promise-forms-printForm', 'BrothersPromiseFormController@printForm')->name('BrothersPromiseForm.printForm');

   //taking-notes
   Route::get('taking-notes', 'TakingNotesController@index')->name('taking-notes.index');

    // Outing Request
    Route::delete('outing-requests/destroy', 'OutingRequestController@massDestroy')->name('outing-requests.massDestroy');
    Route::resource('outing-requests', 'OutingRequestController');

    //my information
    Route::get('my-info', 'EditMyInfoController@edit')->name('edit-info');
    Route::post('my-info', 'EditMyInfoController@update')->name('update-info');

    // small brother info
    Route::get('/show/MySmallbrother', 'EditMyInfoController@Smallbrotherinfo')->name('brotherhood.show');

    // calender
    Route::get('calender','HomeController@calender')->name('calender');

    // Inequality
     Route::delete('inequalities/destroy', 'InequalityController@massDestroy')->name('inequalities.massDestroy');
     Route::resource('inequalities', 'InequalityController');
});  
