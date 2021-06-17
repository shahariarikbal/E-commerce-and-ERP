<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    protected $guarded = [];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseProductCount()
    {
        return $this->hasMany(ProductQtyCount::class);
    }
}
