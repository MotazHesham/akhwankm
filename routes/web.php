<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::post('big-brothers/register','RegisterController@big_brother')->name('big-brothers.register');
Route::get('big-brothers/register' , 'RegisterController@register')->name('big-brothers.register');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Small Brother
    Route::delete('small-brothers/destroy', 'SmallBrotherController@massDestroy')->name('small-brothers.massDestroy');
    Route::get('small-brothers/printinfo/{smallBrother}' , 'SmallBrotherController@printinfo')->name('small-brothers.print');
    Route::resource('small-brothers', 'SmallBrotherController');

    // Big Brother
    Route::delete('big-brothers/destroy', 'BigBrotherController@massDestroy')->name('big-brothers.massDestroy'); 
    Route::get('big-brothers/printinfo/{bigBrother}' , 'BigBrotherController@printinfo')->name('big-brothers.print');
    Route::resource('big-brothers', 'BigBrotherController');
    

    // Skills
    Route::delete('skills/destroy', 'SkillsController@massDestroy')->name('skills.massDestroy');
    Route::resource('skills', 'SkillsController');

    // Characteristics
    Route::delete('characteristics/destroy', 'CharacteristicsController@massDestroy')->name('characteristics.massDestroy');
    Route::resource('characteristics', 'CharacteristicsController');

    // Outing Type
    Route::delete('outing-types/destroy', 'OutingTypeController@massDestroy')->name('outing-types.massDestroy');
    Route::resource('outing-types', 'OutingTypeController');

    // Brothers Deal Form
    Route::delete('brothers-deal-forms/destroy', 'BrothersDealFormController@massDestroy')->name('brothers-deal-forms.massDestroy');
    Route::get('brothers-deal-forms/printForm/{brothersDealForm}','BrothersDealFormController@printForm')->name('brothers-deal-forms.print');
    Route::resource('brothers-deal-forms', 'BrothersDealFormController');

    // Outing Request
    Route::delete('outing-requests/destroy', 'OutingRequestController@massDestroy')->name('outing-requests.massDestroy');
    Route::resource('outing-requests', 'OutingRequestController');

    // Approvement Form
    Route::delete('approvement-forms/destroy', 'ApprovementFormController@massDestroy')->name('approvement-forms.massDestroy');
    Route::resource('approvement-forms', 'ApprovementFormController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');

    }
});
