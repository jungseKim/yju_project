<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\postController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logOut']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
});
Route::get('/add', [ItemController::class, 'index']);

Route::post('/profile', [UserController::class, 'profile']);

Route::patch('/addressUpdate', [UserController::class, 'addressUpdate']);

Route::middleware('auth:sanctum')->post('/productAdd', [postController::class], 'addProduct');
