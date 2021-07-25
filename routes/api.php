<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Small Brother
    Route::apiResource('small-brothers', 'SmallBrotherApiController');

    // Big Brother
    Route::apiResource('big-brothers', 'BigBrotherApiController');

    // Skills
    Route::apiResource('skills', 'SkillsApiController');

    // Characteristics
    Route::apiResource('characteristics', 'CharacteristicsApiController');

    // Outing Type
    Route::apiResource('outing-types', 'OutingTypeApiController');

    // Brothers Deal Form
    Route::apiResource('brothers-deal-forms', 'BrothersDealFormApiController');

    // Outing Request
    Route::apiResource('outing-requests', 'OutingRequestApiController');

    // Approvement Form
    Route::apiResource('approvement-forms', 'ApprovementFormApiController');
});
