<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebCategory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'cat_id', 'id');
    }
}
