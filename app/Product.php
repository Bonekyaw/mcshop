<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function category ()
    {
    	return $this->belongsTo(\App\Category::class);
    }
    public function brand ()
    {
    	return $this->belongsTo(\App\Brand::class);
    }
    public function tags ()
    {
        return $this->belongsToMany(\App\Tag::class);
    }
    public function histories ()
    {
    	return $this->hasMany(\App\History::class);
    }
}
