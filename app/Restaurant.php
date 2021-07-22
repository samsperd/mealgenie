<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
