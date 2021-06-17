<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CountryProduct extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
