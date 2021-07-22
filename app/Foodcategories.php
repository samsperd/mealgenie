<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodcategories extends Model
{
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function foods()
    {
        return $this->hasMany(Food::class);
    }    
}
