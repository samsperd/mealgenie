<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class Item extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'items';

    protected $fillable = ['slug', 'name'];

    public function mart()
    {
        return $this->belongsTo(Voyager::modelClass('Mart'));
    }

}
