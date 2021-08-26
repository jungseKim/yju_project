<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
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
        // return Item::find(1)->ItemToChat();
        // return 1;
        $toSell = User::find(Auth::user()->id)->items();
        $toBuy = ChatUser::where('user_id', Auth::user()->id)->get();

        // return [$toSell, $toBuy];

        return  response()->json([
            'toSell' => $toSell,
            'toBuy' => $toBuy
        ], 200);
    }

    public function store($id)
    {
        $user_id = Auth::user()->id;
        $item_id = $id;
        $user = Item::find($item_id)->user()->get()[0];

        // return $user[0];
        // return $user->id;

        if ($user_id == $user->id) {
            return  response()->json([
                'message' => '판매자는 자신과 채팅못함'
            ], 299);
        }

        $check = ChatUser::where('user_id', $user_id)
            ->Where('item_id', $item_id)->first();

        // return $check;

        if ($check) {
            return redirect('/api/room/' . $check->id);
        }

        $chat = new ChatUser();
        $chat->user_id = $user_id;
        $chat->item_id =  $item_id;
        $chat->save();

        return response()->json([
            'roomid' =>
            $chat->id
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
        $message->save();

        MessageSent::dispatch($message->load('writer'));

        return $message->load('writer');
    }

    public function room($id)
    {
        $room = ChatUser::find($id);

        // return $room->history()->toJson();
        return response()->json([
            // 'messages'
            // => $room->history(),
            'roomid' => $room->id,
            'messages'
            => $room->history()->load('writer'),
        ], 203);
    }
}
