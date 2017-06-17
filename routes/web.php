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
})->name('home');

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //
    Route::get('/', function () {
    return view('admin.index');
});

    Route::resource('/users','AdminUsersController');
    Route::resource('/adposts','AdminPostsController');
    Route::resource('/categories','AdminCategoriesController');


});
Route::resource('/posts','PostsController');
Route::get('/user/{name}','UserController@show')->name('user.show');
Route::get('/user/{name}/edit','UserController@edit')->name('user.edit');
Route::put('/user/{name}','UserController@update')->name('user.update');
Route::delete('/user/{id}','UserController@destroy')->name('user.delete');


// Route::resource('users','LoginController',['only' => ['index']]);

