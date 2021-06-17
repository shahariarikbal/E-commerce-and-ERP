<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebProduct extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function webcategory()
    {
        return $this->hasMany(WebCategory::class);
    }

    public function webbrand()
    {
        return $this->belongsTo(WebBrand::class, 'brand_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(WebProduct::class);
    }

    public function webManufacture()
    {
        return $this->belongsTo(WebManufacture::class, 'manufacture_id', 'id');
    }

    public function productQuality()
    {
        return $this->hasMany(ProductQuality::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
