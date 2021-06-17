<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function saleProductCount()
    {
        return $this->hasMany(SaleProductCount::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
