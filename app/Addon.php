<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function restaurant()
    {
        return $this->belongsTo(School::class);
    }
    public function food()
    {
        return $this->belongsToMany(Food::class, 'food_addon');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
