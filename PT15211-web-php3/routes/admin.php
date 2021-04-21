<?php
use Illuminate\Support\Facades\Route;
Route::get("/", function(){
    return "trang quản trị";
});

Route::get('users', function(){
    return "Quản trị danh sách người dùng";
});
?>