<?php

use Illuminate\Support\Facades\DB;

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


// Route For Showing the Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes For showing login,logout,register,password reset,Route
Auth::routes();

//Route For installing Initial Database tables,This route will not avilable after one request or successfully create databases tables.

$tables_exists= DB::select('SHOW TABLES');
if (!$tables_exists) {
Route::get('/install','InstallController@index');
Route::post('/install','InstallController@install');
}




//Admin routes,ONly Admin CAn view these Routes

Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //Route for admin home page
    Route::get('/','AdminController@index');
// Routes for managing the users form admin panel
    Route::resource('/users','AdminUsersController');
 // Routes for managing the posts from admin panel
    Route::resource('/adposts','AdminPostsController',['except' => ['show']]);
  // Routes for managing the Catagories from admin panel
    Route::resource('/categories','AdminCategoriesController',['except' => ['show']]);
   // Routes for maanging the comments from admin panel
    Route::get('/comments','AdminCommentsController@index')->name('comments.index');

    Route::delete('/comments/{id}/destroy','AdminCommentsController@destroy')->name('comments.destroy');
// Routes for changing app settings from admin panel
    Route::resource('/settings', 'settingsController',['only' => ['index','update']]);


});


// 
//Routes for posts 
Route::resource('/posts','PostsController');

//Routes For author Archive Page
Route::get('/posts/archive/author/{name}','PostsController@authorArchive')->name('archive.author');
// Route for category archive page
Route::get('/posts/archive/category/{name}','PostsController@categoryArchive')->name('archive.category');

// Route For time Archive page
Route::get('/posts/archive/time','PostsController@timeArchive')->name('archive.time');


//Route for showing a single user posts its public
Route::get('/user/{name}/posts','PostsController@userPosts')->name('user.posts');
// Route for showing a user info
Route::get('/user/{name}','UserController@show')->name('user.show');
// Route for showing the user info edit page
Route::get('/user/{name}/edit','UserController@edit')->name('user.edit');
// Route for update the user info via put request
Route::put('/user/{name}','UserController@update')->name('user.update');
// Route for delete  the user Account via Delete request
Route::delete('/user/{id}','UserController@destroy')->name('user.delete');


//Comments Route=>Post a Comment
Route::post('/post/{post}/comment','CommentsController@store')->name('comment.store');
//Comments Route=>Delete a Comment
Route::delete('/post/comment/{id}','CommentsController@destroy')->name('comment.destroy');


