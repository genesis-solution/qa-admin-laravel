<?php

Route::redirect('/', '/home');
//Route::redirect('/home', '/admin');
Route::get('/home', 'HomeController@index');
Route::post('/question/{q_index}/{a_index}', 'HomeController@processQuestion')->name('question');
Route::post('/my_contact', 'HomeController@myContact');
Route::redirect('/question/{q_index}/{a_index}', '/home');
Route::redirect('/my_contact', '/home');

Auth::routes(['register' => false]);

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

});
