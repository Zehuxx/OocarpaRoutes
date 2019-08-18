<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Role extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'roles';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasMany(\App\Models\User::class,'role_id','_id');
    }
}