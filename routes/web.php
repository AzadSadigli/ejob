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

Route::get('/','Controller@index');
Route::get('/contact','Controller@contact');
Route::get('/job/{id}','JobController@jobdetails');
Route::get('/jobs','JobController@jobs');
Route::get('/add-vacancy','JobController@addvacancy');
Route::post('/add-new-vacancy','JobController@addjob');
Route::get('/create-resume','ResumeController@addresume');

Route::get('/test','JobController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
