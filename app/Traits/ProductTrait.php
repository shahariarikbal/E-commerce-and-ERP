<?php


namespace App\Traits;

use App\Model\Product;

trait  ProductTrait
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
