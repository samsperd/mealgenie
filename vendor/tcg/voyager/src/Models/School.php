<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class School extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'schools';

    protected $fillable = ['slug', 'name'];

    public function restaurants()
    {
        return $this->hasMany(Voyager::modelClass('Restaurant'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }
    public function foods()
    {
        return $this->hasMany(Voyager::modelClass('Food'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }
    public function addons()
    {
        return $this->hasMany(Voyager::modelClass('Addon'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }    
}
