<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingControllsr extends Controller
{
    public function following(User $user)
    {
        return view('user.following',[
            'title' => 'profile',
            'user' =>  $user,
            'following' => $user->follows,
            'followers' => $user->followers
        ]);
    }

    public function follower(User $user){
        return view('user.followers',[
            'title' => 'profile',
            'following' => $user->follows,
            'followers' => $user->followers
        ]);
    }


    // public function index(User $user, $following)
    // {
    //     dd(auth::user()->hasFollow($user));
    //     if($following !== "follower" && $following !== "following"){
    //         return redirect('profile', $user->username);
    //     }

    //     return view('user.following'. [
    //         'user' =>$user,
    //         'follows' => $following == "following" ? $user->follows : $user->followers
    //     ]);

    // }

    public function store(Request $request, User $user){
       auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) :  Auth::user()->follow($user);
       return back()->with("success", "You are follow the user");
    }

    public function storeHapus(){
        Auth::user()->hapus(auth()->user());
       return back()->with("success", "You are follow the user");
    }
}
