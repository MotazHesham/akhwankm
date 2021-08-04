<?php   

Route::group(['prefix' => 'bigbrother', 'as' => 'bigbrother.', 'namespace' => 'Bigbrother', 'middleware' => ['auth','bigbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
}); 