<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class Advert extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['image', 'name'];

    protected $table = 'adverts';

    protected $fillable = ['image', 'name'];


}
