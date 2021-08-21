<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use SebastianBergmann\Environment\Console;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        //return ($request->address);
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required'],
            'address' => 'required|string'
        ]);

        if ($validator->fails()) {
            // return redirect('register erroor')
            //     ->withErrors($validator)
            //     ->withInput();
            // return ($validator->errors());
            return response($validator->errors(), 442);
        }



        // $user = User::create([
        //     // 'name' => $request->name,
        //     // 'email' => $request->email,
        //     // 'password' => Hash::make($request->password),
        //     // 'address' => $request->address
        // ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->address=$request->address;
            $user->save();
        return response($user, 202);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
