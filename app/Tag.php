<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Tag extends Model
{
	use Cachable;
    protected $guarded = [];

    public function products ()
    {
    	return $this->belongsToMany(\App\Product::class);
    }
}
