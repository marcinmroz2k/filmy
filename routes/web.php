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

//Strona główna
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Wszystkie filmy
Route::get('movies' , 'MoviesController@get')->name('movies');

//Usuwanie filmu
Route::delete('delete/movies/{id}' , 'MoviesController@delete');

//Edycja filmu
Route::put('edit/movies/{id}/submit' , 'MoviesController@update');

//Template - edycja filmu
Route::get('edit/movies/{id}' , 'MoviesController@edit');

//Template - podgląd filmu
Route::get('movies/{id}' , 'MoviesController@preview');

//Template - dodwaanie filmu
Route::get('add-blade' , function(){
	return view('add-blade');
})->name('add-blade');

//Dodawanie filmu
Route::post('add-movie' , 'MoviesController@store')->name('add-movie');

//Wyszukiwanie
Route::get('search','SearchController@search');