<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\posting;
class PostControllers extends Controller
{
    public function index(){
        return view('trending', [
            "title" => "trending",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
            
        ]);
    }
    public function trending(){
        return view('trending', [
            "title" => "trending",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function setting(){
        return view('setting', [
            "title" => "setting",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function profile(){
        return view('profile',[
            "title" => "profile",
            "users" => User::latest()->get(),
            'posts' => posting::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function form_login(){
        return view('form-login', ["
        title" => "form-login",
        "users" => User::latest()->get(),
        'posts' => posting::where('user_id', auth()->user()->id)->get()
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
