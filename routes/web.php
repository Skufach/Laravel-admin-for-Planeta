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


Route::group([
   'namespace' => 'AdminPanel',
    'prefix' => 'AdminPanel',
], function (){
    Route::get('/', function(){
        return  redirect('AdminPanel/posts/');
    });

    Route::resource('/posts', 'PostController');

    Route::resource('/categories', 'CategoryController');

    Route::resource('/countries', 'CountryController');
});

