<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::get('/dong/{userId}', [postController::class, 'dongs'])->name('dong');

Route::get('/api/post', [postController::class, 'posts']);

Route::middleware('auth:sanctum')->get('/api/show/{id}', [postController::class, 'show']);

// Route::post('/api/posts', [postController::class, 'store']);

Route::middleware('auth:sanctum')->post('/api/posts', [postController::class, 'store']);

Route::middleware('auth:sanctum')->get('/api/chatList', [ChatController::class, 'index']);

// Route::get('/api/item/{id}', [ItemController::class, 'show']);

Route::middleware('auth:sanctum')->post('/api/chatPost', [ChatController::class, 'post']);
