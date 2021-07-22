<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class Food extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'foods';

    protected $fillable = ['slug', 'name'];

    public function restaurant()
    {
        return $this->belongsTo(Voyager::modelClass('Restaurant'));
    }
    public function school()
    {
        return $this->belongsTo(Voyager::modelClass('School'));
    }
    public function addon()
    {
    return $this->belongsToMany($table, 'food_addon')
    ->select(app($table)->getTable().'.*')
    ->union($this->hasMany($table))->getQuery();
    }

}
