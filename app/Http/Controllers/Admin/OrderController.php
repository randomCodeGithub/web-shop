<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $orders = Order::active()->get();
        
            return view('admin.orders', compact('orders'));
        
    }

    public function show(Order $order) {

        $products = $order->products()->withTrashed()->get();
        return view('admin.showOrder', compact('order', 'products'));
    }
}
