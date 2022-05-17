<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\posting;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class PostControllers extends Controller
{
    public function belajar(){
        return view('belajar', [
            "todo" => Todo::all()
        ]);
    }
    public function index(){
        return view('trending', [
            "title" => "trending",
            "users" => User::where('id', '!=', auth()->user()->id)->get(),
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
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
