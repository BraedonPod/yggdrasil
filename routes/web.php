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

Route::get('/', 'HomeController@index');

Auth::routes();
//Movie Routes
Route::get('/movies', 'MovieController@index');
Route::get('/movie/{slug}', 'MovieController@show');

//Book Routes
Route::get('/books', 'BookController@index');
Route::get('/book/{slug}', 'BookController@show');


//Library Routes
Route::post('/library','LibraryController@store');

//Profile Routes
Route::get('/profile/{slug}', 'ProfileController@index');
Route::get('/profile/{slug}/library', 'ProfileController@library');
Route::get('/profile/{slug}/followers', 'ProfileController@library');
Route::get('/profile/{slug}/following', 'ProfileController@library');
Route::get('/profile/{slug}/groups', 'ProfileController@library');

//Comment Routes
Route::post('/comment/create', 'CommentController@store');


// Route::middleware('auth')->group(function () {
//     Route::prefix('settings')->group(function () {
//         Route::get('account', 'UsersController@edit')->name('users.edit');
//         Route::match(['put', 'patch'], 'account', 'UsersController@update')->name('users.update');
//         Route::get('password', 'UserPasswordsController@edit')->name('users.password');
//         Route::match(['put', 'patch'], 'password', 'UserPasswordsController@update')->name('users.password.update');
//     });
// });

Route::prefix('admin')->middleware(['auth', 'role:admin'])->namespace('Admin')->as('admin.')->group(function () {

});