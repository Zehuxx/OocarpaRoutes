<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Route extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'routes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'name','description','coordinates'
    ];
 
    public function User()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id','_id');
    }

    public function RouteType()
    {
        return $this->belongsTo(\App\Models\RouteType::class,'Route_Type_id','_id');
    }
}