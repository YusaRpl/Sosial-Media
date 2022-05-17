<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(){
        return $this->hasMany(posting::class);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function postings()
    {
        $following = $this->follows()->pluck('id');
        return $posting = posting::whereIn('user_id', $following)
                            ->orWhere('user_id', $this->id)
                            ->latest()
                            ->get();
    }


    public function postingku()
    {
        $idku = Auth::user('id');
        return $posting = posting::whereIn('user_id', $idku)
                            ->orWhere('user_id', $this->id)
                            ->latest()
                            ->get();
    }
    public function post_user(User $user)
    {
        $idku = $user->id;
        return $posting = posting::whereIn('user_id', $idku)
                            ->orWhere('user_id', $this->id)
                            ->latest()
                            ->get();
    }

    public function follow (User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow (User $user)
    {
        // dd($user);
        return $this->follows()->detach($user);
    }

    public function hapus()
    {
        // dd(auth()->user());
        return $this->followers()->detach(auth()->user());
    }

    public function hasFollow(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
