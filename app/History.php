<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	protected $guarded = [];
    public function product ()
    {
    	return $this->belongsTo(\App\Product::class);
    }
}
