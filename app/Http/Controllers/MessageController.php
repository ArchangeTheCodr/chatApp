<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function show($id){
        $receiver = User::findOrfail($id);
        $receiver_id = $receiver->id;
        $sender_id = auth()->id();

        $messages = Message::where(function ($query) use ($sender_id, $receiver_id){
            $query->where('sender_id' ,$sender_id)
                ->where('receiver_id' ,$receiver_id);
        })->orWhere(function ($query) use ($sender_id, $receiver_id){
            $query->where('sender_id' ,$receiver_id)
                ->where('receiver_id' ,$sender_id);
        })->get();
        // dd($messages);
        if (!$messages) {
            return [];
        }

        return [
            'messages' => $messages,
        ];
    }
}
