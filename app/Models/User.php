<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract, AuthorizableContract,CanResetPasswordContract
{ 
    use Authenticatable, Authorizable, CanResetPassword, Notifiable, SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'role_id', 'name','last_name','email','password','user_img'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role()
	{
    	return $this->belongsTo(\App\Models\Role::class,'role_id','_id');
	}

	public function Route()
    {
        return $this->hasMany(\App\Models\Route::class,'user_id','_id');
    }

    public function Company()
    {
        return $this->hasOne(\App\Models\Company::class,'company_id','_id');
    }
}