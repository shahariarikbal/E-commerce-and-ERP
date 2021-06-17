<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function dailyPaid()
    {
        return $this->hasMany(DailyPaid::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }
}
