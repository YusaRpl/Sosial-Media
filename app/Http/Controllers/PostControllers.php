<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\posting;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class PostControllers extends Controller
{
    public function pertama(){
        $username = auth()->user()->username;
        return redirect()->intended('/trending/'.$username);
    }
    public function index(Request $request){
        return view('trending', [
            "balas" => $request,
            "title" => "trending",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get(),
        ]);
    }
    public function setting(){
        return view('setting', [
            "title" => "setting",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function follows(User $user)
    {
        return view('profile',[
            'title' => 'profile',
            'user' => $user,
            'posting' => posting::where('user_id', $user->id),
            'following' => $user->follows,
            'followers' => $user->followers
        ]);
    }
    public function chat(){
        return view('chat', [
            "title" => "chat",
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
