<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Coupon extends Model
{
    use Translatable;

    protected $translatable = ['coupons'];

    protected $table = 'coupons';

    protected $fillable = ['coupons'];

    // public function coupons()
    // {
    //     return $this->hasMany(Voyager::modelClass('Order'))
    //         ->published()
    //         ->orderBy('created_at', 'DESC');
    // }

}
