<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductQtyCount extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function purchaseProductQty()
    {
        return $this->hasMany(PurchaseProduct::class);
    }
}
