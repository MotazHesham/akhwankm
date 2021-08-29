<?php

Route::post('ajax/cities','AjaxController@cities')->name('ajax.cities');

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::post('big-brothers/register','RegisterController@big_brother')->name('big-brothers.registerStore');
Route::post('small-brothers/register','RegisterController@small_brother')->name('small-brothers.registerStore');

Route::get('big-brothers/register' , 'RegisterController@register')->name('big-brothers.register');
Route::get('small-brothers/register' , 'RegisterController@register2')->name('small-brothers.register');

Route::post('big-brothers/register/media', 'RegisterController@storeMedia')->name('big-brothers.storeMedia');
Route::post('big-brothers/register/ckmedia', 'RegisterController@storeCKEditorImages')->name('big-brothers.storeCKEditorImages');

Route::post('big-brothers/choose_small_brothers' , 'RegisterController@choose_small_brothers')->name('big-brothers.choose_small_brothers');

Route::post('users/media', 'Admin\UsersController@storeMedia')->name('admin.users.storeMedia');
Route::post('users/ckmedia', 'Admin\UsersController@storeCKEditorImages')->name('admin.users.storeCKEditorImages');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Chatting 
    Route::get('/chatting','ConversationsController@index')->name('chatting.index');
    Route::post('/chatting/show','ConversationsController@show')->name('chatting.show');
    Route::post('/chatting/send','ConversationsController@send')->name('chatting.send');
    Route::post('/chatting/refresh_contacts','ConversationsController@index')->name('chatting.refresh_contacts');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Specialists
    Route::delete('specialists/destroy', 'SpecialistsController@massDestroy')->name('specialists.massDestroy');
    Route::resource('specialists', 'SpecialistsController');

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
    Route::POST('big-brother/smallbrother' ,'BigBrotherController@chooseSmallbrother')->name('choose.smallbrother');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Dating Sessions
    Route::delete('dating-sessions/destroy', 'DatingSessionsController@massDestroy')->name('dating-sessions.massDestroy');
    Route::resource('dating-sessions', 'DatingSessionsController');
    
    // Periodic Sessions
    Route::delete('periodic-sessions/destroy', 'PeriodicSessionsController@massDestroy')->name('periodic-sessions.massDestroy');
    Route::resource('periodic-sessions', 'PeriodicSessionsController');

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
    Route::get('approvement-forms/printForm/{approvementForm}','ApprovementFormController@printForm')->name('approvement-forms.print'); 

    // General Settings
    Route::post('general-settings/media', 'GeneralSettingsController@storeMedia')->name('general-settings.storeMedia');
    Route::post('general-settings/ckmedia', 'GeneralSettingsController@storeCKEditorImages')->name('general-settings.storeCKEditorImages');
    Route::resource('general-settings', 'GeneralSettingsController', ['except' => ['create', 'store', 'show', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
        // Inequality
        Route::delete('inequalities/destroy', 'InequalityController@massDestroy')->name('inequalities.massDestroy');
        Route::resource('inequalities', 'InequalityController');
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
