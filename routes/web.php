<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\MenuController;
use App\Http\Controller\AdminController;

/*  frontend  */

Route::get('/', 'AdminController@show_home');

Route::get('/Menu', 'AdminController@show_menu');

Route::get('/home', 'AdminController@show_home');

Route::get('/blog', 'AdminController@show_blog');

Route::get('/about', 'AdminController@show_about');

Route::get('/contact', 'AdminController@index_contact');

Route::get('/single-blog', 'AdminController@index_single');

Route::get('/buyurtma_berish/{id}', 'AdminController@index_buyurtma');

Route::get('/elements', 'AdminController@index_elements');

Route::post('/sendEmail', 'AdminController@sendEmail');

Route::post('/comment', 'AdminController@comment');

/*  backend  */

Route::get('/menu_admin', 'AdminController@index_menu');
Route::post('/insert_menu', 'AdminController@store');

Route::get('/blog_admin', 'AdminController@index_blog');
Route::post('/insert_blog', 'AdminController@store_blog');

Route::get('/instagram_admin', 'AdminController@index_instagram');
Route::post('/insert_instagram', 'AdminController@store_instagram');

Route::get('/gallery_admin', 'AdminController@index_gallery');
Route::post('/insert_gallery', 'AdminController@store_gallery');

Route::get('/buyurtma', 'AdminController@show_buyurtma');

Route::get('/admin', 'AdminController@admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
