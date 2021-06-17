<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    //**********************//
    //***  Relationship  ***//
    //**********************//

    public function product()
    {
        return $this->hasMany(Product::class, 'sub_cat_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function productSubcategory()
    {
        return $this->hasMany(ProductSubcategory::class, 'subcategory_id', 'id');
    }

}
