<?php

use App\Models\UrlShortener;


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
Route::get('/', 'App\Http\Controllers\UrlShortenerController@index')->name('home');
Route::get('/most','App\Http\Controllers\UrlShortenerController@getMostShortenUrl');
Route::get('/stats','App\Http\Controllers\UrlShortenerController@getViewShortPage')->name('stats');


$urlShort = UrlShortener::orderBy('id','desc')->limit(1)->get();
Route::redirect($urlShort[0]->url_key, $urlShort[0]->to_url,301)->name('redirection');
    

Route::group(['middleware' => ['cors']], function () {
    Route::post('/create', 'App\Http\Controllers\UrlShortenerController@generateUrlShort')->name('short');
});




/* 
Route::get('/', function () {
    return view('welcome');
});
 */