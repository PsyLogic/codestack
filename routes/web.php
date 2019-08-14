<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions','QuestionController')->except('show');
Route::get('questions/{slug}','QuestionController@show')->name('questions.show');
Route::resource('questions.answers','AnswerController')->except(['show','index', 'create']);
Route::patch('questions/{question}/answers/{answer}/accept','AnswerController@accept')->name('questions.answers.accept');
Route::post('questions/{question}/favorite_status','FavoriteController@changeFavoriteStatus')->name('questions.favorite_status');