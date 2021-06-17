<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function purchaseProduct()
    {
        return $this->hasMany(PurchaseProduct::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseProductCount()
    {
        return $this->hasMany(ProductQtyCount::class);
    }

    public function stockes()
    {
        return $this->hasMany(Stock::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
