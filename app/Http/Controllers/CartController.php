<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Http\Requests\OrderConfirmRequest;
use App\Mail\OrderCreated;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function cart()
    {
        $orderId = session('order_Id');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view("pages.cart", compact('order'));
        }
        return view("pages.cart");
    }

    public function checkout()
    {
        $cart = new Cart();
        $order = $cart->getOrder();

        if (is_null($order) || !count($order->products)) {
            return redirect()->route('cart');
        }
        if (!$cart->countAvailable()) {
            session()->flash('warning', 'Product is not available at the full count');
            return redirect()->route('cart');
        }
        return view('pages.checkout', compact('order'));
    }

    public function cartAdd(Product $product)
    {
        $result = (new Cart(true))->addProduct($product);

        if ($result) {
            session()->flash('addItem', 'Added item ' . $product->name);
        } else {
            session()->flash('warning', 'Max count of ' . $product->name);
        }



        return redirect()->route('cart');
    }

    public function cartRemove(Product $product)
    {
        $cart = new Cart();
        $order = $cart->getOrder();
        if (is_null($order)) {
            return redirect()->route('cart');
        }
        $cart->removeProduct($product);

        session()->flash('removeItem', 'Remove item ' . $product->name);

        return redirect()->route('cart');
    }

    public function confirm(OrderConfirmRequest $request)
    {
        $cart = new Cart();
        $order = $cart->getOrder();

        $email = Auth::check() ? Auth::user()->email : $request->email;

        if (is_null($order) || !count($order->products)) {
            return redirect('/');
        } else {

            if (!$cart->countAvailable(true)) {
                session()->flash('warning', 'Product is not available at the full count');
                return redirect()->route('cart');
            }
            Mail::to($email)->send(new OrderCreated());
            if (Auth::check()) {
                $success = $order->saveOrderAuth();
            } else {
                $success = $order->saveOrderGuest($request->firstName, $request->lastName);
            }

            if ($success) {
                session()->flash('success', 'Your order has been accepted!');
            }
            return redirect('/');
        }
    }
}
