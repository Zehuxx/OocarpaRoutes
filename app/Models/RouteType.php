<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class RouteType extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'route_types';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

	public function Route()
    {
        return $this->hasMany(\App\Models\Route::class,'route_type_id','_id');
    }
}