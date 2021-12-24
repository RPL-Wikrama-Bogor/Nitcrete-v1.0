<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.index');
    }

    public function store(Request $request)
    {
        $valided = $request->validate([
            'to' => 'required|string|max:25',
            'message' => 'required|string|max:120'
        ]);

        $touser = User::where([
            'username' => $valided['to']
        ])->count();

        if ($touser > 0) {
            Message::create($request->all());
            return back()->with('msgscss','Your message was sent successfully');
        }else {
            return back()->with('usrerr', 'Recipient not found');
        }
    }
}
