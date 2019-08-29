<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Company extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'companies';
    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'company_id','name','phone','description','address'
    ];

	public function User()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id','user_id');
    }

    public function Banner()
    {
        return $this->hasMany(\App\Models\Banner::class,'company_id','company_id');
    }

    public function Location()
    {
        return $this->hasMany(\App\Models\Location::class,'company_id','company_id');
    }

    public function Company_Plan()
    {
        return $this->hasMany(\App\Models\Company_Plan::class,'company_id','company_id');
    }
}