<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();

    $checkUser = User::where('uid', $user->id)->first();

    if ($checkUser) {
        Auth::login($checkUser);

        return redirect()->route('web.home')->with('success', __('Logged in successfully'));
    } else {
        $newUser = User::create([
            'uid'      => $user->id,
            'fname'    => $user->user['given_name'],
            'lname'    => $user->user['family_name'],
            'email'    => $user->email,
            'isActive' => 1,
        ]);

        Auth::login($newUser);

        return redirect()->route('web.home')->with('success', __('Logged in successfully'));
    }

    // $user->token
});

Route::namespace('Web')->name('web.')->middleware('localization')->group(function () {

    // Authentication
    Route::get('register', 'AuthController@registerFrom')->name('register');
    Route::post('register-submit', 'AuthController@registerSubmit')->name('register-submit');
    Route::get('verify-account/{type}', 'AuthController@verifyAccount')->name('verify-account');
    Route::post('verify-submit/{type}', 'AuthController@verifySubmit')->name('verify-submit');
    Route::get('login', 'AuthController@loginForm')->name('login');
    Route::get('forget-password', 'AuthController@forgetPassword')->name('forget-password');
    Route::post('check-user', 'AuthController@checkUser')->name('check-user');
    Route::get('change-password', 'AuthController@changePassword')->name('change-password');
    Route::post('change-password-submit', 'AuthController@changePasswordSubmit')->name('change-password-submit');
    Route::post('login-submit', 'AuthController@loginSubmit')->name('login-submit');
    Route::get('logout', 'AuthController@logout')->name('logout');



    // Home
    Route::get('/', 'HomeController@index')->name('home');

    // About Us
    Route::get('about-us', 'StaticPageController@about')->name('about');

    // Terms of Use
    Route::get('terms-of-use', 'StaticPageController@terms')->name('terms');

    // section
    Route::get('{sectionSlug}/categories', 'SectionController@index')->name('section-categories');

    // body system
    Route::get('{sectionSlug}/body-system/{bodySystemSlug}', 'SectionController@bodySystem')->name('body-system');

    // category details
    Route::get('{sectionSlug}/category-details/{slug}', 'SectionController@categoryDetails')->name('category-details');

    // article details
    Route::get('{sectionSlug}/article-details/{slug}', 'SectionController@articleDetails')->name('article-details');

    // pregnancy stage details
    Route::get('{sectionSlug}/pregnancy-stage/{slug}', 'SectionController@pregnancyStage')->name('pregnancy-stage');

    // pregnancy stage details
    Route::get('{sectionSlug}/search-diseases', 'SectionController@searchDiseases')->name('search-diseases');

    Route::get('{sectionSlug}/search-calories', 'SectionController@searchCalories')->name('search-calories');


    Route::get('videos', 'VideoController@index')->name('videos');
    Route::get('video-details/{slug}', 'VideoController@videoDetails')->name('video-details');
    Route::get('videos/search-videos', 'VideoController@searchVideos')->name('search-videos');


    Route::get('faqs', 'FaqController@index')->name('faqs');
    Route::get('faqs/faq-details/{slug}', 'FaqController@faqDetails')->name('faq-details');

    Route::get('search-articles', 'HomeController@searchArticles')->name('search-articles');

    Route::get('contact-us', 'ContactController@showForm')->name('contact-us');
    Route::post('contact-us/store', 'ContactController@sendContact')->name('send-contact');

    Route::get('all-calculators', 'CalculatorController@allCalculators')->name('all-calculators');
    Route::get('calorie-calculator', 'CalculatorController@calorie')->name('calorie-calculator');
    Route::get('pregnancy-calculator', 'CalculatorController@pregnancy')->name('pregnancy-calculator');
    Route::get('bmi-calculator', 'CalculatorController@bmi')->name('bmi-calculator');
    Route::get('heart-rate-calculator', 'CalculatorController@heartRate')->name('heart-rate-calculator');
    Route::get('calorie-burn-calculator', 'CalculatorController@calorieBurnCalculator')->name('calorie-burn-calculator');
    Route::get('ovulation-period-calculator', 'CalculatorController@ovulationPeriodCalculator')->name('ovulation-period-calculator');
    Route::get('baby-development-calculator', 'CalculatorController@babyDevelopmentCalculator')->name('baby-development-calculator');
    Route::get('baby-growth-calculator', 'CalculatorController@babyGrowthCalculator')->name('baby-growth-calculator');

    Route::middleware(['auth'])->group(function () {
        Route::get('profile', 'AuthController@profile')->name('profile');
        Route::patch('update-profile', 'AuthController@updateProfile')->name('update-profile');
    });
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
