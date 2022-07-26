<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['posting_id', 'user_id', 'comment'];
    protected $with = ['user'];
    public function comment(){
        return $this->belongsTo(posting::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function replies()
    {
        return $this->hasMany(comment::class, 'parent_id');
    }
}
