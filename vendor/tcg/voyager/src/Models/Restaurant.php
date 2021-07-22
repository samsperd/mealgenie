<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;

class Restaurant extends Model
{
    use Translatable;
    use Resizable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'restaurants';

    protected $fillable = ['slug', 'name'];

    public function school()
    {
        return $this->belongsTo(Voyager::modelClass('School'), 'school_id', 'id');
    }
    public function foods()
    {
        return $this->hasMany(Voyager::modelClass('Food'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
