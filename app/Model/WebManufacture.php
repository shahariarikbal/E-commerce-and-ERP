<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebManufacture extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'manufacture_id', 'id');
    }

    public function accessoriesproduct()
    {
        return $this->hasMany(Accessories::class, 'manufacture_id', 'id');
    }

    public function productManufacture()
    {
        return $this->hasMany(ProductManufacture::class, 'manufacture_id', 'id');
    }
}
