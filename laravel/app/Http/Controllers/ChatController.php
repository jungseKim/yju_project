<?php

namespace App\Http\Controllers;

use App\Models\ChatUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        return ChatUser::where('user_to', $user);
    }

    public function post(Request $request)
    {
        $from = Auth::user()->id;
        $to = $request->user_to;
        $text = $request->text;

        $chat = new ChatUser();
        $chat->user_to = $to;
        $chat->user_from = $from;
        $chat->text = $text;
        $chat->save();

        return $chat;
    }
}
