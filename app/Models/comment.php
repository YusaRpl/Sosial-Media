<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['posting_id', 'user_id', 'comment'];

    public function comment(){
        return $this->belongsTo(posting::class);
    }
}
