<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    //**********************//
    //***  Relationship  ***//
    //**********************//

    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function webcategory()
    {
        return $this->hasMany(WebCategory::class);
    }

    public function webproduct()
    {
        return $this->hasMany(WebProduct::class, 'cat_id', 'id');
    }
    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class, 'category_id', 'id');
    }
}
