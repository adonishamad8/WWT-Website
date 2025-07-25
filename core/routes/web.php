<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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


Auth::routes(['register' => false], ['login' => false]);

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

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));

    return "Sitemap generated successfully!";
});


use App\Http\Controllers\MontyEsimController;

Route::get('monty/login', [MontyEsimController::class, 'login']);
Route::get('/monty/agent', [MontyEsimController::class, 'getAgentDetails']);

Route::get('/monty/check-token', [App\Http\Controllers\MontyEsimController::class, 'checkToken']);
Route::get('/esims', [MontyEsimController::class, 'showEsimPlans']);









