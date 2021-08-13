<?php

Route::group(['prefix' => 'bigbrother', 'as' => 'bigbrother.', 'namespace' => 'Bigbrother', 'middleware' => ['auth','bigbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home');

//Brothers Deal Form
    Route::get('brothers-deal-forms/printForm/{brothersDealForm}','BrothersDealFormController@printForm')->name('brothers-deal-forms.print');
    Route::get('brothers-deal-forms/view/{brothersDealForm}','BrothersDealFormController@view')->name('brothers-deal-forms.view');

    Route::get('brothers-deal-forms-index/{user_id}', 'BrothersDealFormController@index')->name('BDFI');
    Route::get('brothers-deal-forms-show/{brothersDealForm}', 'BrothersDealFormController@show')->name('BDFShow');
//Promise Form
    Route::get('brothers-promise-forms-view/{bigBrother}', 'BrothersPromiseFormController@view')->name('BrothersPromiseForm.view');
    Route::get('brothers-promise-forms-printForm/{bigBrother}', 'BrothersPromiseFormController@printForm')->name('BrothersPromiseForm.printForm');


    // Outing Request
    Route::delete('outing-requests/destroy', 'OutingRequestController@massDestroy')->name('outing-requests.massDestroy');
    Route::resource('outing-requests', 'OutingRequestController');

    //my information
    Route::resource('big-brothers', 'EditMyInfoController');

    // small brother info

    Route::get('/show/MySmallbrother/{bigBrother}', 'EditMyInfoController@Smallbrotherinfo')->name('brotherhood.show');
});

