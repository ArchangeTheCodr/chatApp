<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', auth()->id())->get();

        return Inertia::render('Chat/Index', [
            'users' => $users
        ]);
    }
}
