<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SupplierPrice extends Model
{
    protected $guarded = [];

    //**********************//
    //***  Relationship  ***//
    //**********************//

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
