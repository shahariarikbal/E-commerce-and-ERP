<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductQuality extends Model
{
    public function webproduct()
    {
        return $this->belongsTo(WebProduct::class, 'web_product_id', 'id');
    }
}
