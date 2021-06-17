<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function dailyPaids()
    {
        return $this->hasMany(DailyPaid::class);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
