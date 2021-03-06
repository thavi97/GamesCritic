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

Route::get('/', function () {
    return redirect('new_games');
});

Route::resource('/new_games', 'NewGamesController');

Route::resource('/profile', 'ProfileController');

Route::patch('/profile/{id}',[
    'as' => 'user.profile.update',
    'uses' => 'ProfileController@update'
]);

Route::resource('/changepassword', 'ChangePasswordController');

Route::get('/remove_wishlist', 'WishlistController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
