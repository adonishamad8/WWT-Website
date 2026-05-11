<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
*/

Auth::routes(['register' => false], ['login' => false]);

// Front routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('front.home');

Route::get('/about', 'AboutController@index')->name('front.about');

Route::get('/mice', 'MiceController@index')->name('front.mice');

Route::get('/clients', 'ClientController@index')->name('front.clients');

Route::get('/blogs', 'EventController@index')->name('front.events');
Route::get('/blog/{id}/{slug}', 'EventController@show')->name('front.event.show');

Route::get('/events', 'BlogController@index')->name('front.blogs');
Route::get('/event/{id}/{slug}', 'BlogController@show')->name('front.blog.show');

Route::get('/packages', 'PackageController@index')->name('front.packages');
Route::get('/packages/{id}/{slug}', 'PackageController@index')->name('front.package');
Route::get('/package/{id}/{slug}', 'PackageController@show')->name('front.package.show');

Route::get('/services', 'ServiceController@index')->name('front.services');
Route::get('/service/{id}/{slug}', 'ServiceController@show')->name('front.service.show');

Route::get('/contact', 'ContactController@index')->name('front.contact');
Route::post('/send_email', 'ContactController@store')->name('front.sendemail');
Route::post('/send_package', 'PackageController@store')->name('front.sendpackage');

Route::get('/download-brochure/{pdf_name}', 'PackageController@downloadBrochure')->name('downloadBrochure');

// ================================
//  Privacy & Policies pages
// ================================

// Privacy Policy page
// ================================
//  Privacy & Policies pages
// ================================

// Privacy Policy page
// Privacy Policy page (TEMP TEST)
Route::get('/privacy', function () {
    return view('front.privacy-policy');
})->name('privacy.policy');




// (Optional) Policies & Compliance page
Route::get('/policies-compliance', function () {
    return view('front.policies-compliance');
})->name('policies.compliance');

// Whistle Blowing page
Route::get('/whistle-blowing', function () {
    $categories = \App\Category::orderBy('order', 'ASC')->where('published', '1')->get();
    return view('front.whistle-blowing', compact('categories'));
})->name('whistle-blowing');

// ================================
//  Admin routes
// ================================
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('abouts', 'AboutController');
    Route::resource('sliders', 'SliderController');
    Route::resource('services', 'ServiceController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('categories', 'CategoryController');
    Route::resource('packages', 'PackageController');
    Route::resource('boards', 'BoardController');
    Route::resource('mices', 'MiceController');
    Route::resource('events', 'EventController');
    Route::resource('blogs', 'BlogController');

    Route::post('mices/media', 'MiceController@storeMedia')->name('mices.storeMedia');
    Route::post('events/media', 'EventController@storeMedia')->name('events.storeMedia');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('packages/media', 'PackageController@storeMedia')->name('packages.storeMedia');
    Route::get('/downloadPdf/{pdf_name}', 'PackageController@downloadPdf')->name('downloadPdf');
});

// ================================
//  Sitemap
// ================================
Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));

    return "Sitemap generated successfully!";
});
