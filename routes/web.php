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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//routes for posts
Route::get('/post/create','PostsController@create')->name('post.create');
Route::post('/post/store','PostsController@store')->name('post.store');
Route::get('/posts','PostsController@index')->name('posts');
Route::get('/post/delete/{id}','PostsController@destroy')->name('post.delete');
Route::get('/post/trashed/','PostsController@trashed')->name('trashed');
Route::get('/post/hdelete/{id}','PostsController@hard_delete')->name('post.hdelete');
Route::get('/post/restore/{id}','PostsController@restore')->name('post.restore');
Route::get('/post/edit/{id}','PostsController@edit')->name('post.edit');
Route::post('/post/update/{id}','PostsController@update')->name('post.update');

//routes for categories
Route::get('/category/create','CategoriesController@create')->name('category.create');
Route::post('/category/store','CategoriesController@store')->name('category.store');
Route::get('/categories','CategoriesController@index')->name('category.index');
Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
Route::post('/category/update/{id}','CategoriesController@update')->name('category.update');
Route::get('/category/delete/{id}','CategoriesController@destroy')->name('category.delete');

//routes for tags

Route::get('/tags','TagController@index')->name('tags');
Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
Route::get('/tag/delete/{id}','TagController@destroy')->name('tag.delete');
Route::get('/tag/create','TagController@create')->name('tag.create');
Route::post('/tag/update/{id}','TagController@update')->name('tag.update');
Route::post('/tag/store','TagController@store')->name('tag.store');

//routes for users

Route::get('/users','UsersController@index')->name('users');
Route::get('/user/create','UsersController@create')->name('user.create');
Route::post('/user/store','UsersController@store')->name('user.store');
Route::get('/user/make-admin/{id}','UsersController@makeAdmin')->name('users.make-admin');
Route::get('/user/un-admin/{id}','UsersController@unAdmin')->name('users.un-admin');
Route::get('/tag/delete/{id}','TagController@destroy')->name('tag.delete');
Route::post('/tag/update/{id}','TagController@update')->name('tag.update');



//settings routes
Route::get('/settings','settingsController@index')->name('settings');

Route::post('settings/update','settingsController@update')->name('settings.update');



// GUI routes
Route::get('/','GuiController@index')->name('index');



//this will return the posts which related to category id
//Route::get('/posts', function (){
//    return App\Category::find(1)->posts;
//})->name('omar');
//
////this will return the category which related to  posts id
//
//Route::get('/categories', function (){
//    return App\Post::find(1)->category;
//})->name('omar');
//
////this will return All posts which related to  tag id
//Route::get('/post-tags', function (){
//    return App\Tag::find(3)->posts;
//})->name('omar');

Route::get('/pro',function (){
    return App\User::find(1)->profile;
});