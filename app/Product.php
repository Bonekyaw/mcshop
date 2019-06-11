<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category ()
    {
    	return $this->belongsTo(\App\Category::class);
    }
    public function brand ()
    {
    	return $this->belongsTo(\App\Brand::class);
    }
    public function histories ()
    {
    	return $this->hasMany(\App\History::class);
    }
}
