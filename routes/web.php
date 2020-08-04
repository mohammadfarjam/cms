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

Route::group(['middleware'=>'admin'],function (){
    Route::resource('admin/users','Admin\AdminUserController');
    Route::resource('admin/posts','Admin\AdminPostController');
    Route::resource('admin/categories','Admin\AdminCategoryController');
    Route::resource('admin/photos','Admin\AdminPhotoController');
    Route::get('admin/dashboard','Admin\dashboardController@index')->name('dashboard.index');



    Route::get('admin/comments','Admin\AdminCommentController@index')->name('comments.index');
    Route::post('admin/actions/{id}','Admin\AdminCommentController@actions')->name('comments.actions');
    Route::get('admin/comments/{id}','Admin\AdminCommentController@edit')->name('comments.edit');
    Route::patch('admin/comments/{id}','Admin\AdminCommentController@update')->name('comments.update');
    Route::delete('admin/comments/{id}','Admin\AdminCommentController@destroy')->name('comments.destroy');

    Route::delete('admin/delete/media','Admin\AdminPhotoController@delete')->name('photo.delete.all');
});

Route::get('/','Frontend\MainController@index');
Route::get('posts/{slug}','Frontend\PostController@show')->name('Frontend.posts.show');
Route::get('search','Frontend\PostController@SearchTitle')->name('Frontend.posts.search');
Route::post('comments/{postId}','Frontend\CommentController@store')->name('Frontend.comments.store');


