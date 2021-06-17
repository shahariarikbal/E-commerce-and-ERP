<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductKeyFeature extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
