<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->active()->orderBy('created_at', 'DESC')->get();

        return view('account.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order) || $order->status == 0) {
            return redirect()->route('account_orders');
        }
        return view('account.showOrder', compact('order'));
    }
}
