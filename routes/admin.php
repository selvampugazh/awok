<?php

Route::get('home', 'Admin\HomeController@index')->name('home');

Route::get('doctor', 'Admin\DoctorController@index')->name('doctor');
Route::get('doctor/create', 'Admin\DoctorController@create')->name('doctor.create');
Route::post('doctor/store', 'Admin\DoctorController@store')->name('doctor.store');
Route::get('doctor/show/{id}', 'Admin\DoctorController@show')->name('doctor.show');
Route::get('doctor/edit/{id}', 'Admin\DoctorController@edit')->name('doctor.edit');
Route::post('doctor/update', 'Admin\DoctorController@update')->name('doctor.update');
Route::get('doctor/delete/{id}', 'Admin\DoctorController@delete')->name('doctor.delete');

//Routes for Users
Route::get('user', 'Admin\UserController@index')->name('user');
Route::get('user/show/{id}', 'Admin\UserController@show')->name('user.show');

//Routes for Appointment
Route::get('appointment', 'Admin\AppointmentController@index')->name('appointment');
Route::get('appointment/show/{id}', 'Admin\AppointmentController@show')->name('appointment.show');








