<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function() {
	
		// Authentication
		Route::post('auth/register', 'AuthController@register');
		Route::post('auth/login', 'AuthController@login');
		Route::get('auth/logout', 'AuthController@logout');

		// user
		Route::get('user', 'UserController@getAuthUser');
		Route::get('users', 'UserController@users');
		Route::post('user/upload', 'UserController@upload');
		Route::put('user/update', 'UserController@update');
	});

Route::group([    
    'middleware' => 'cors',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});