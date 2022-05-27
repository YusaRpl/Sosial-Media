<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'posting_id', 'value', 'username'];

    public function like(){
        return $this->belongsTo(posting::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
