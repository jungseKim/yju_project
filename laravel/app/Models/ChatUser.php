<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class ChatUser extends Model
{
    use HasFactory;
    protected $table = "chat_users";

    public function history()
    {
        // return $this->hasMany(Message::class, 'ChatRoom_id');

        return Message::where('ChatRoom_id', $this->id)->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
