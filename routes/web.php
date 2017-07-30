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
//install route
Route::get('/install','InstallController@index');
Route::post('/install','InstallController@install');

// Route::get('/home', 'HomeController@index')->name('home');

//Admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //
    Route::get('/','AdminController@index');

    Route::resource('/users','AdminUsersController');
    Route::resource('/adposts','AdminPostsController');
    Route::resource('/categories','AdminCategoriesController');
    Route::get('/comments','AdminCommentsController@index')->name('comments.index');
    Route::delete('/comments/{id}/destroy','AdminCommentsController@destroy')->name('comments.destroy');
    Route::resource('/settings', 'SettingsController',['only' => ['index','update']]);


});



//Posts Route
Route::resource('/posts','PostsController');
//archive page
Route::get('/posts/archive/author/{name}','PostsController@authorArchive')->name('archive.author');
Route::get('/posts/archive/category/{name}','PostsController@categoryArchive')->name('archive.category');
Route::get('/posts/archive/time','PostsController@timeArchive')->name('archive.time');


//User Routes
Route::get('/user/{name}/posts','PostsController@userPosts')->name('user.posts');
Route::get('/user/{name}','UserController@show')->name('user.show');
Route::get('/user/{name}/edit','UserController@edit')->name('user.edit');
Route::put('/user/{name}','UserController@update')->name('user.update');
Route::delete('/user/{id}','UserController@destroy')->name('user.delete');


//Comments Route
Route::post('/post/{post}/comment','CommentsController@store')->name('comment.store');
Route::delete('/post/comment/{id}','CommentsController@destroy')->name('comment.destroy');

// Route::resource('users','LoginController',['only' => ['index']]);

