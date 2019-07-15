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



Auth::routes();
Route::get('/', function () {
        return view('guest.index');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });    
Route::get('/careers','JobController@publishjobs');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth','role:user,admin']], function(){
    Route::get('detail-job/{id}','JobController@show');
    Route::get('settings','UserController@changePassword');
    Route::post('change-password','UserController@prosesChangePassword');
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
    Route::delete('user/delete/{id}','UserController@destroy')->name('delete-user');
    Route::get('change-status/{id}/{id2}','ApplicantsController@changeStatus')->name('changestatus');
    Route::post('update-status','ApplicantsController@updateStatus')->name('update-status');
});