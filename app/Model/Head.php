<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    public function parent(){
    	return $this->belongsTo('App\Model\Head', 'head_id', 'id');
    }

    public function children(){
    	return $this->hasMany('App\Model\Head');
    }
}
