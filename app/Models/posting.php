<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    public $table = "postings";
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'id';
    }

    public function like(){
        return $this->hasMany(like::class)->latest();
    }

    public function commentss()
    {
        return $this->morphMany(comment::class, 'posting')->whereNull('parent_id');
    }

    public function comments(){
        return $this->hasMany(comment::class)->whereNull('parent_id')->latest();
    }

    public function comment(){
        return $this->hasMany(comment::class)->latest();
    }

}
