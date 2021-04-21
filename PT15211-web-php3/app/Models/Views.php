<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;
    protected $table = "luotxem";

    public function post(){
        return $this->belongsTo(Post::class, 'bai_viet_id');
    }
}