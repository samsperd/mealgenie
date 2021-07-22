<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Itemtype extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'itemtypes';

    protected $fillable = ['slug', 'name'];

    public function marts()
    {
        return $this->hasMany(Voyager::modelClass('Mart'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function school()
    {
        return $this->belongsTo(Voyager::modelClass('School'));
    }
}
