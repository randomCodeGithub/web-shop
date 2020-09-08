<?php

namespace App\Classes;

use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;

class Cart
{
    protected $order;

    public function __construct($createOrder = false)
    {
        $orderId = session('order_Id');
        if (is_null($orderId)) {
            $this->order = Order::create();
            session(['order_Id' => $this->order->id]);
        }else {
           $this->order = Order::find($orderId); 
        }

        
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable($updateCount = false)
    {
        foreach ($this->order->products as $orderProduct) {

            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {
                return false;
            }
            if ($updateCount) {
                $orderProduct->count -= $this->getPivotRow($orderProduct)->count;
            }
        }
        if ($updateCount) {
            $this->order->products->map->save();
        }
        return true;
    }

    public function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }

    public function addProduct($product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            $pivotRow->update();
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
        }
        if (Auth::check()) {
            $this->order->user_id = Auth::user()->id;
            $this->order->save();
        }
        return true;
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
    }
}
