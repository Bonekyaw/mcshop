<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class History extends Model
{
	use Cachable;
	protected $guarded = [];
    public function product ()
    {
    	return $this->belongsTo(\App\Product::class);
    }
    public function user ()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
