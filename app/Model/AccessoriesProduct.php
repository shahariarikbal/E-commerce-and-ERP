<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessoriesProduct extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'accessories_id', 'id');
    }

    public function accessories()
    {
        return $this->belongsTo(Accessories::class, 'accessories_id', 'id');
    }
}
