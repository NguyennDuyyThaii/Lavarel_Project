<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        // // hiển thị danh sách hóa đơn 
        // $orders = Order::all();
        // $orders->load('order_details', 'products');
        // // - trong mỗi hóa đơn có bao nhiêu sản phẩm

        // return view('order.index', compact('orders'));
    }
}
