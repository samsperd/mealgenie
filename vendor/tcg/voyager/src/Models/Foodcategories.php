<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Foodcategories extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'foodcategories';

    protected $fillable = ['slug', 'name'];

    public function food()
    {
        return $this->hasMany(Voyager::modelClass('Addon'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

}
