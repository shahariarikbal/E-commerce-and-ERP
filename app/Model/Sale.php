<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function saleProduct()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function stockes()
    {
        return $this->hasMany(Stock::class);
    }
}
