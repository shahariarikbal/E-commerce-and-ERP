<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
