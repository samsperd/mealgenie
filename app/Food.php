<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function foodcategories()
    {
        return $this->belongsTo(Foodcategories::class);
    }
    public function addons()
    {
        return $this->hasMany(Addon::class, 'food_addon');
    }
}
