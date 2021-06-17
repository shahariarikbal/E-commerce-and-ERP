<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DailyPaid extends Model
{
    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
