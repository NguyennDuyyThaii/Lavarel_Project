<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Views;

class Post extends Model
{
    use HasFactory;
    protected $table = "baiviet";
    
    public function danhmuc(){
        return $this->belongsTo(Danhmuc::class, 'danh_muc_id');
    }

    public function luotxem(){
        return $this->hasMany(Views::class, 'bai_viet_id');
    }
}
