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
        'password' => 'required',

    ]);

    $user = User::where('email', $request->email)->first();

    // echo "<script>console.log( 'PHP_Console: " . $user->password . $request->password . '안녕wsss' . "' );</script>";


    // if (!$user || !Hash::check($request->password, $user->password)) {
    //     return response([
    //         'message' => ['These credentials do not match our records.']
    //     ], 404);
    // }
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

// Route::middleware('auth:sanctum')->post('/addProduct', [postController::class, 'addProduct']);
Route::post('/addProduct', [postController::class, 'addProduct']);

Route::post('/imagepath', [postController::class, 'imagepath']);

Route::post('/search', [postController::class, 'search']);

// Route::post('addSearch', [postController::class, 'addsearch']);
