<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\postController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/item/{id}', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'showCategory']); // query 스트링은 get으로 안됨
Route::post('/comment/{itemId}', [RegisteredUserController::class, 'store']);

Route::middleware('auth:sanctum')->post('/productAdd', [postController::class], 'addProduct');

Route::middleware('auth:sanctum')->post('/deleteAccount', function () {
    $userId = Auth::user()->id;

    DB::delete('DELETE FROM users WHERE id = ?', [$userId]);

    // $user->delete();
    return '회원탈퇴가 완료되었습니다.';
    // return $user;
});
