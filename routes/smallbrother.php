<?php   

Route::group(['prefix' => 'smallbrother', 'as' => 'smallbrother.', 'namespace' => 'Smallbrother', 'middleware' => ['auth','smallbrother']], function () {
    Route::get('/', 'HomeController@index')->name('home'); 
}); 