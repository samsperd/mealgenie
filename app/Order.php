<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
