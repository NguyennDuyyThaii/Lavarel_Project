<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $table = "danhmuc";
    public function posts(){
        return $this->hasMany(Post::class, 'danh_muc_id');
    }
}
