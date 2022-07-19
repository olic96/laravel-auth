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

// back office - area pubblica - auth
Auth::routes();

// back office - area privata
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
     Route::get('/home', 'HomeController@index')->name('home');
     Route::resource('posts', 'PostController');
    });
    
// front office
Route::any('{any?}', function() {
    return view('guest.home');
})->where('any', '.*');
