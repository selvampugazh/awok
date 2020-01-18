<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\AuthController@register');
Route::post('send-otp', 'Api\AuthController@send_otp');
Route::post('reset-password', 'Api\AuthController@reset_password');
Route::post('verify-user', 'Api\AuthController@verify_user');


//Routes for fileds
Route::post('fields-create', 'Api\Fields\FieldsController@create');
Route::get('fields', 'Api\Fields\FieldsController@index');

//Routes for tractors
Route::post('tractor-create', 'Api\Tractors\TractorsController@create');
Route::get('tractors', 'Api\tractors\TractorsController@index');

//Routes for fields processings
Route::post('processing-create', 'Api\Processing\ProcessingController@create');
Route::get('fieldprocessings', 'Api\Processing\ProcessingController@index');

//Routes for fields processing reports
Route::post('field-processings-reports', 'Api\Processing\ProcessingController@reports');

//User Api
Route::group(['middleware' => ['api', 'multiauth:api'], 'prefix' => 'user'], function () {

	//Routes for Basic Details
	Route::get('basic-details', 'Api\User\UserController@get_basic_details');
	Route::post('basic-details', 'Api\User\UserController@basic_details');
	Route::post('profile-upload', 'Api\User\UserController@profile_upload');
});

