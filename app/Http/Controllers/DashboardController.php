<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index'); 
    }

    public function indexa()
    {
        $users = User::where(
            'username', Auth::user()->username
        )->get();
        
        $messages = Message::where(
            'to', Auth::user()->username
        )->get();
        $countmessage = $messages->count();
        if ($countmessage > 0) {
            $msg = "You have message";
            return view('dashboard.index',compact('users','messages','msg'));
        }else{
            $msg = "You dont have message rn, dont be sad :)";
            return view('dashboard.index',compact('users','messages','msg'));
        }
    }
}
