<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'country_id', 'id');
    }
}
