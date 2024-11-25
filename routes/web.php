<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

 Route::any('/customLogin', 'Auth\LoginController@customLogin')->name('customLogin');

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
    Route::resource('users', 'UsersController');

    // Case Intake
    Route::resource('case_intake', 'CaseController');
    Route::any('party-delete/{id}', 'CaseController@partyDelete');

    // CheckList 
    Route::resource('checklist', 'ChecklistController');
    Route::any('checklist-delete/{id}', 'ChecklistController@checklistDelete');
    Route::any('update-status', 'ChecklistController@updateStatus')->name('update-status');
    Route::any('update-data', 'ChecklistController@updateData')->name('update.data');
    

    Route::any('loadChecklistFile', 'CaseController@loadChecklist')->name('loadChecklist');
    Route::any('updateChecklistStatus', 'CaseController@updateChecklistStatus')->name('updateChecklistStatus');
    Route::any('updateChecklistDueDate', 'CaseController@updateChecklistDueDate')->name('updateChecklistDueDate');

    Route::any('get-states-by-country', 'CaseController@getState')->name('getState');
    Route::any('get-cities-by-state', 'CaseController@getCity')->name('getCity');


    Route::resource('lead', 'LeadsController');
    Route::resource('card', 'CardsController');


});
