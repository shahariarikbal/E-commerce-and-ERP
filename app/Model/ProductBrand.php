<?php

namespace App\Model;

use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    use ProductTrait;
    protected $guarded = [];

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(WebBrand::class);
    }
}
