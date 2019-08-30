<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Route extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'routes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id','route_type_id','is_public', 'name','description','coordinates'
    ];

    
  
    public function User()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id','_id');
    }

    public function RouteType()
    {
        return $this->belongsTo(\App\Models\RouteType::class,'route_type_id','_id');
    }


      
}