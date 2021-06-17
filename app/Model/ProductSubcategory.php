<?php

namespace App\Model;

use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use ProductTrait;
    protected $guarded = [];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
