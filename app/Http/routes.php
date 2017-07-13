<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('users/{id}/destroy', 'UserController@destroy');
    
    Route::get('backups/showfiles', 'BackupController@showAllCopies');
    Route::get('backups/downloadfile/{file_name}', 'BackupController@downloadFile');
    Route::get('backups/deletefile/{file_name}/{user_id}', 'BackupController@deleteFile');
    Route::resource('backups', 'BackupController');
    
    Route::get('logs/{id}', 'LogController@listClient');
    Route::get('logs', 'LogController@index');
});

Route::get('/api/log/create', 'LogController@store');