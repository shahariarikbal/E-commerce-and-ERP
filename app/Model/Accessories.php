<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    
    public function bulkproducts()
    {
        return $this->hasMany(AccessoriesBulkImage::class);
    }

    public function countryProduct()
    {
        return $this->hasMany(CountryProduct::class, 'product_id', 'id');
    }
    
    public function stocks()
    {
        return $this->hasMany(Stock::class,'accessories_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_cat_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(WebBrand::class, 'brand_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id', 'id');
    }

    public function accessoriesProduct()
    {
        return $this->hasMany(AccessoriesProduct::class, 'accessories_id', 'id');
    }
}
