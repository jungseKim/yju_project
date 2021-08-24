<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function logOut(Request $request)
    {

        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Successfully logged out');
        // $value = $request->cookie('my-app-token');
        // $request->bearerToken()
    }

    public function profile(Request $request)
    {
        $userId = $request->userId;

        $users = DB::table('users')->where('id', $userId)->get();

        return response()->json($users);
    }

    public function addressUpdate(Request $request)
    {
        $addressUpdate = $request->address;
        $userId = $request->userId;

        $dd = DB::table('users')
            ->where('id', $userId)
            ->update(['address' => $addressUpdate]);

        return redirect('/');
    }
}
