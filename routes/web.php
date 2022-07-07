<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkedinController;
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
Route::middleware(['auth','entreprise'])->group(function(){
    //entreprise
    Route::resource('entreprise', EntrepriseController::class);
    Route::resource('user', InfosController::class);
});
//chercheur
Route::middleware(['auth','cherheur'])->group(function(){
    //entreprise
    Route::resource('chercheur', ChercheurController::class);
    Route::resource('user', InfosController::class);
});
//Routes publique
    //job
    Route::get('/','WebsiteController@acceuill')->name('website.index');
    Route::get('website/job','WebsiteController@job')->name('website.job');
    Route::get('website/about','WebsiteController@about')->name('website.about');
    Route::get('website/contact','WebsiteController@contact')->name('website.contact');
    //linkedin
    Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
    Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);
    Route::fallback(function() {
        return view('404'); // la vue 404.blade.php
     });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
