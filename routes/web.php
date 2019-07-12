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


Route::group(['middleware'=>['auth','role:user,admin']], function(){
    Route::get('detail-job/{id}','JobController@show');
});

Route::group(['middleware'=>['auth','role:user']], function(){
    Route::get('profile','UserController@me');
    Route::get('profile/edit','UserController@editme')->name('edit-profile');
    Route::put('profile/update/{id}', 'UserController@updateme')->name('profile-update');
    Route::get('open-jobs','JobController@index');
    Route::post('apply-jobs/{id}','JobController@apply')->name('apply');
    Route::get('my-applications','ApplicantsController@me');
    
});

Route::group(['middleware'=>['auth','role:admin']], function(){
    Route::get('manage-user','UserController@index');
    Route::get('manage-applicants','ApplicantsController@index');
    Route::get('manage-jobs','JobController@index');
    Route::get('user-detail/{id}','UserController@show');
    Route::get('applicants-detail/{id}','UserController@show');
    Route::get('edit-job/{id}','JobController@edit');
    Route::get('add-job','JobController@create');
    Route::put('jobs/update/{id}','JobController@update')->name('update-job');
    Route::post('jobs/insert','JobController@store')->name('insert-job');
    Route::delete('jobs/delete/{id}','JobController@destroy')->name('delete-job');
});