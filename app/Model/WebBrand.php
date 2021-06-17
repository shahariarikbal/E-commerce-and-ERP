<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebBrand extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function accessoriesproduct()
    {
        return $this->hasMany(Accessories::class, 'brand_id', 'id');
    }

    public function productBrands()
    {
        return $this->hasMany(ProductBrand::class);
    }
}
