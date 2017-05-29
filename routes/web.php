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

Route::get("/thread/all", "ThreadController@index")->name("thread.index");
Route::post("/thread/create", "ThreadController@store")->name("thread.store");
Route::get("/thread/{thread}", "ThreadController@show")->name("thread.show");

Route::post("/thread/{thread}/post/{post?}", "PostController@storeReply")->name("post.reply.store");
Route::get("/thread/{thread}/post/{post?}", "PostController@createReply")->name("post.reply.create");