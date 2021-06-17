<?php

namespace App\Model;

use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use ProductTrait;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
