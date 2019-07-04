<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Brand extends Model
{
	use Cachable;
	protected $guarded = [];
    public function products ()
    {
    	return $this->hasMany(\App\Product::class);
    }
}
