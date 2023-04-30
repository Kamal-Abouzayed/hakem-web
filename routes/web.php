<?php

use App\Models\Article;
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

// Localization Routes
Route::get('language/{locale}', function ($locale) {

    app()->setLocale($locale);

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

Route::namespace('Web')->name('web.')->middleware('localization')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
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

        Route::get('ckeditor', 'CkeditorController@index');

        Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

        Route::get('/', 'HomeController@index')->name('home');

        // Users
        Route::resource('users', 'UserController')->names('users');

        // Sections
        Route::resource('sections', 'SectionController')->names('sections');

        // Ads
        Route::resource('ads', 'AdController')->names('ads');

        // Faqs
        Route::resource('faqs', 'FaqController')->names('faqs');

        // categories
        Route::resource('section/{sectionSlug}/categories', 'CategoryController')->names('categories');

        // // sub categories
        // Route::resource('section/{sectionSlug}/sub-categories', 'SubCategoryController')->names('sub-categories');

        // Advices
        Route::resource('section/{sectionSlug}/advices', 'AdviceController')->names('advices');

        // Articles
        Route::resource('section/{sectionSlug}/articles', 'ArticleController')->names('articles');

        // Body Systems
        Route::resource('body-systems', 'BodySystemController')->names('body-systems');

        // Organs
        Route::resource('organs', 'OrganController')->names('organs');

        // Videos
        Route::resource('videos', 'VideoController')->names('videos');

        // Images
        Route::resource('images', 'ImageController')->names('images');

        // Pregnancy Stages
        Route::resource('pregnancy-stages', 'PregnancyStageController')->names('pregnancy-stages');

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
