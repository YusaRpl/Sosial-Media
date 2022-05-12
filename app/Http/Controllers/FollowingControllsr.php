<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingControllsr extends Controller
{
    public function following(User $user)
    {
        return view('user.following',[
            'title' => 'profile',
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
}
