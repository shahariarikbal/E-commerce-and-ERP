<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessoriesBulkImage extends Model
{
    protected $guarded = [];

    public function accessories()
    {
        return $this->belongsTo(Accessories::class, 'accessories_id', 'id');
    }
}
