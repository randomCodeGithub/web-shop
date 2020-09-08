<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query) {

        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrderGuest($name, $phone)
    {

        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('order_Id');
            return true;
        } else {
            return false;
        }
    }

    public function saveOrderAuth()
    {
        if ($this->status == 0) {
            if($this->user_id == null) {
                $this->user_id = Auth::user()->id;
            }
            $this->status = 1;
            $this->save();
            session()->forget('order_Id');
            return true;
        } else {
            return false;
        }
    }
}
