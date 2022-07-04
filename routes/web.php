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
//Route protégée
Route::middleware(['auth'])->group(function(){


});
//Routes publique
Route::middleware(['guest'])->group(function(){
    //job
    Route::get('website/job','WebsiteController@job')->name('website.job');
    Route::get('website/about','WebsiteController@about')->name('website.about');
    Route::get('website/contact','WebsiteController@contact')->name('website.contact');


});

Route::get('/', function () {
    return view('website/index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
