<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanaviController;
use App\Http\Controllers\PlacePostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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
use Illuminate\http\Request;
use Illuminate\http\Response;


Route::group(['middleware' => 'auth'], function () { //ログイン認証しないとアクセス制限
    Route::get('/', [PlacePostController::class, 'top']);
    Route::get('/place_list', [PlacePostController::class, 'index']);
    Route::get('/place_list/{place}/detail', [PlacePostController::class, 'detail']);
    Route::get('/place_post', [PlacePostController::class, 'place_post']);
    Route::post('/place_post', [PlacePostController::class, 'place_post_store']);
    Route::get('/{place}/place_edit', [PlacePostController::class, 'place_edit']);
    Route::put('/place_edit/{place_post}', [PlacePostController::class, 'update']);
    Route::delete('/{place_post}/place_edit', [PlacePostController::class, 'destroy']);
    Route::get('/about', [PlacePostController::class, 'about']);

    Route::get('/{place}/post', [PostController::class, 'post']);
    Route::post('{place}/post', [PostController::class, 'post_store']);
    Route::get('/{post}/post_edit', [PostController::class, 'post_edit']);
    Route::put('/post_edit/{post}', [PostController::class, 'update']);
    Route::delete('/place_list/{post}/detail', [PostController::class, 'destroy']);
    // Route::delete('/detail/{place}', [PostController::class, 'destroy']);

    Route::get('/sanavi', [SanaviController::class, 'create']);
    Route::post('/sanavi', [SanaviController::class, 'store']);
    Route::delete('/sanavi/{sanavi}', [SanaviController::class, 'destroy']);
    Route::put('/sanavi/{sanavi}', [SanaviController::class, 'update']);
    Route::get('/sanavi/{sanavi}/show', [SanaviController::class, 'show']);
    Route::resource('items', 'ItemsController'); //ルーティングファイルを見やすくする
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
