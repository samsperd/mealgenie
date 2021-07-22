<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
