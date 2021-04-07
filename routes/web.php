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
    return view('app');
});
Route::get('/translations/{lang}', [App\Http\Controllers\TranslationController::class, 'edit']);
Route::post('/translations/store', [App\Http\Controllers\TranslationController::class, 'store'])->name('translations.store');
Route::get('/translations/delete/{id}', [App\Http\Controllers\TranslationController::class, 'destroy'])->name('translations.delete');
Route::post('/languages/update_rtl_status', 'App\Http\Controllers\LanguageController@update_rtl_status')->name('languages.update_rtl_status');
//Route::post('/languages/key_value_store', 'App\Http\Controllers\LanguageController@key_value_store')->name('languages.key_value_store');
//Route::get('language', 'App\Http\Controllers\LanguageController@changeLanguage')->name('language.change');
Route::get('/', 'App\Http\Controllers\LanguageController@index')->name('languages.index');
Route::get('/languages', 'App\Http\Controllers\LanguageController@index')->name('languages.index');
//Route::get('/languages/create', 'App\Http\Controllers\LanguageController@create')->name('languages.create');
//Route::post('/languages/store', 'App\Http\Controllers\LanguageController@store')->name('languages.store');
//Route::get('/languages/show/{id}', 'App\Http\Controllers\LanguageController@show')->name('languages.show');
//Route::get('/languages/edit/{id}', 'App\Http\Controllers\LanguageController@edit')->name('languages.edit');
//Route::put('/languages/update', 'App\Http\Controllers\LanguageController@update')->name('languages.update');
//Route::get('/languages/destroy/{id}', 'App\Http\Controllers\LanguageController@destroy')->name('languages.destroy');
