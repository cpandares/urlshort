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

$urlShort = UrlShortener::paginate(1);

foreach ($urlShort as $url ) {
    Route::redirect($url->url_key, $url->to_url,301)->name('redirection');
}


Route::get('/', 'App\Http\Controllers\UrlShortenerController@index');
Route::post('/create', 'App\Http\Controllers\UrlShortenerController@generateUrlShort')->name('short');


/* 
Route::get('/', function () {
    return view('welcome');
});
 */