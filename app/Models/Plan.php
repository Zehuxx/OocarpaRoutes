<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Plan extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'plans';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description','price','duration', 'days', 'nbanners'
    ];

    public function Company_Plan()
    {
        return $this->hasMany(\App\Models\Company_Plan::class,'plan_id','_id');
    }

}
