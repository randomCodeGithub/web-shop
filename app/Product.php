<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'image', 'price', 'count',
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount() {
        if(!is_null($this->pivot)) {
           return $this->pivot->count * $this->price;
        }
        return $this->price;

    }

    public function isAvailable() {
        return !$this->trashed() && $this->count > 0;
    }
}
