<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('create', 'App\Http\Controllers\ContactFormController@create')->name('contact.create');
    Route::post('store', 'App\Http\Controllers\ContactFormController@store')->name('contact.store');
    Route::get('show/{id}', 'App\Http\Controllers\ContactFormController@show')->name('contact.show');
    Route::get('edit/{id}', 'App\Http\Controllers\ContactFormController@edit')->name('contact.edit');
    Route::post('update/{id}', 'App\Http\Controllers\ContactFormController@update')->name('contact.update');
    Route::post('destroy/{id}', 'App\Http\Controllers\ContactFormController@destroy')->name('contact.destroy');
});

Route::resource('contacts', 'App\Http\Controllers\ContactFormController')->only([
    'index', 'show'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
