<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'role_id', 'name','last_name','email','password','user_img'
    ];

    public function Role()
	{
    	return $this->belongsTo(\App\Models\Role::class,'role_id','_id');
	}

	public function Route()
    {
        return $this->hasMany(\App\Models\Route::class,'user_id','_id');
    }
}