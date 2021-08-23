<?php

namespace App\Http\Controllers;

use App\Models\ChatUser;
use App\Models\Item;
use App\Models\Message;
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

    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        $item_id = $request->item_id;

        if ($user_id == Item::find($item_id)->user_id()->id) {
            return  response()->json([
                'message' => '판매자는 자신과 채팅못함'
            ], 299);
        }

        $check = ChatUser::where('user_id', $user_id)
            ->orWhere('item_id', $item_id)->first();
        if ($check) {
            return response()->json([
                'messages'
                => $check->history(),
                'roomid' =>
                $check->id
            ], 201);
        }

        $chat = new ChatUser();
        $chat->user_id = $user_id;
        $chat->item_id =  $item_id;
        $chat->save();

        return response()->json([
            'roomid' =>
            $check->id
        ], 202);
    }

    public function post(Request $request)
    {
        $request->validate([
            'roomid' => 'required',
            'text' => 'required',
        ]);

        $message = new Message();
        $message->ChatRoom_id = $request->roomid;
        $message->writer = Auth::user()->id;
        $message->text = $request->text;
    }
}
