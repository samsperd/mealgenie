<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Mart extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'marts';

    protected $fillable = ['slug', 'name'];

    public function school()
    {
        return $this->belongsTo(Voyager::modelClass('School'));
    }
    public function items()
    {
        return $this->hasMany(Voyager::modelClass('Item'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
