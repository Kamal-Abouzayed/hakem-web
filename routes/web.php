<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::namespace('Web')->name('web.')->group(function () {
    // Route::get('/', 'HomeController@index')->name('home');

    Route::view('/', 'welcome');
});


Route::prefix('dashboard')->namespace('Dashboard')->name('dashboard.')->group(function () {

    /* Auth Routes */
    Route::get('login', 'AuthController@loginForm')->name('login_form');
    Route::post('login', 'AuthController@login')->name('login_submit');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('reset-password', 'AuthController@reset')->name('admin.reset');
    Route::post('send-link', 'AuthController@sendLink')->name('admin.sendLink');
    Route::get('changePassword/{code}', 'AuthController@changePassword')->name('admin.changePassword');
    Route::post('update-password', 'AuthController@updatePassword')->name('admin.updatePassword');

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::get('/', 'HomeController@index')->name('home');

        // Users
        Route::resource('users', 'UserController')->names('users');

        // Students
        Route::resource('students', 'StudentController')->names('students');

        // Teachers
        Route::resource('teachers', 'TeacherController')->names('teachers');

        // Contacts
        Route::resource('contacts', 'ContactController')->names('contacts');
        Route::get('contacts/reply/{id}', 'ContactController@reply')->name('contacts.reply');
        Route::post('contacts/send-reply/{id}', 'ContactController@sendReply')->name('contacts.sendReply');

        // Settings
        Route::resource('settings', 'SettingController')->names('settings');

        // Mail Lists
        Route::get('mail-list', 'MailListController@index')->name('mail.index');

        Route::delete('mail-list/{id}', 'MailListController@deleteMail')->name('mail.deleteMail');

        // Profile
        Route::get('profile', 'ProfileController@getProfile')->name('profile');

        Route::patch('update-profile', 'ProfileController@updateProfile')->name('update_profile');
    });
});
