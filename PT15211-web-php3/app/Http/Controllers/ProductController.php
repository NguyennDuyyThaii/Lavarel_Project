<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use LengthException;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        // $ordersdetails = OrderDetail::all();
        // $products->load('category');
        // return view('products.index', compact('products'));
    }
}
