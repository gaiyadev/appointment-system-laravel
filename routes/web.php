<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'AdminController@index')->name('home');


//Paient Routes
Route::get('/bookAppointment', 'Appointment\AppointmentController@showAppointment')->name('bookAppointment');
Route::get('/profile', 'Dashboard\DashboardController@profile')->name('profile');

//Posting patient data
Route::POST('/book', 'Appointment\AppointmentController@bookAppointment')->name('patient.book');
Route::get('/showAppointment', 'Appointment\AppointmentController@showAppointment')->name('patient.show');

//Route::post('/delete', 'Appointment\AppointmentController@destroy')->name('patient.delete');
Route::delete('appointment/{id}', 'Appointment\AppointmentController@destroy')->name('patient.delete');


Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');

//Route::get('/profile', 'Dashboard\DashboardController@showProfile')->name('profile.show');
//Route::get('ajax-crud', 'Appointment\AppointmentController@edit');

//admin
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');