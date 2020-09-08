<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name', 'code', 'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeByCode($query, $code) {

        return $query->where('code', $code);

    }
}
