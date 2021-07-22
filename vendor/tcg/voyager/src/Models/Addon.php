<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class Addon extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'addons';

    protected $fillable = ['slug', 'name'];

    public function restaurant()
    {
        return $this->belongsTo(Voyager::modelClass('Restaurant'));
    }
    public function addon()
    {
        return $this->belongsToMany(Voyager::modelClass('Food'), 'food_addon');
    }

}
