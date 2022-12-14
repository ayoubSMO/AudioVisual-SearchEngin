<?php

use App\Http\Controllers\imageSearchController;
use App\Http\Controllers\StableDiffController;
use App\Http\Controllers\voiceSimularController;
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
    return view('welcome');
});

Route::get('/upload',function(){
    return view('SearchEngin.imageSearch');
});

Route::get('/AI',function(){
    return view('SearchEngin.StableDiffusion.homepage');
});

Route::resource('upload', imageSearchController::class);
Route::resource('simular', voiceSimularController::class);
Route::resource('AI', StableDiffController::class);