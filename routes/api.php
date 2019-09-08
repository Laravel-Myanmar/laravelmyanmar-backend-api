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

Route::get('articles', 'Api\Article\ArticleApiController@index');
Route::post('articles', 'Api\Article\ArticleApiController@store');

Route::get('articles/{article}', 'Api\Article\ArticleApiController@show');
Route::put('articles/{article}', 'Api\Article\ArticleApiController@update');
Route::delete('articles/{article}', 'Api\Article\ArticleApiController@delete');