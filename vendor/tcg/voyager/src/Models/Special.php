<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Special extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'food'];

    protected $table = 'specials';

    protected $fillable = ['slug', 'food'];

}
