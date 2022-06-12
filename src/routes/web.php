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


Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function() {
    Route::get('index', 'App\Http\Controllers\ContactFormController@index')->name('contact.index');
});

Route::resource('contacts', 'App\Http\Controllers\ContactFormController')->only([
    'index', 'show'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
