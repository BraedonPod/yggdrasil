<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/favorite/{movie}', 'Api\MovieController@favoriteMovie');
Route::post('/unfavorite/{movie}', 'Api\MovieController@unFavoriteMovie');




Route::namespace('Api')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/Movie/{movie}/likes', 'MovieLikesController@store')->name('movie.likes.store');
        Route::delete('/Movie/{movie}/likes', 'MovieLikesController@destroy')->name('movie.likes.destroy');
        
        Route::post('/Book/{book}/likes', 'BookLikesController@store')->name('book.likes.store');
        Route::delete('/Book/{book}/likes', 'BookLikesController@destroy')->name('book.likes.destroy');
        
        Route::resource('/Movie/{movie}/status', 'LibraryEntryController', ['only' => ['store', 'update']]);
        
        Route::get('/Movie/{movie}/librarystatus', 'LibraryEntryController@show');
    });
    
    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');
});