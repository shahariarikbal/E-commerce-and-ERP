<?php

namespace App\Model;

use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Model;

class ProductManufacture extends Model
{
    use ProductTrait;
    protected $guarded = [];

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function manufacture()
    {
        return $this->belongsTo(WebManufacture::class, 'manufacture_id', 'id');
    }
}
