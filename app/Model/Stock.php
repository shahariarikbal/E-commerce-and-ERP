<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function accessories()
    {
        return $this->belongsTo(Accessories::class, 'accessories_id', 'id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }
}
