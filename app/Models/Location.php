<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Location extends Eloquent
{
	use SoftDeletes; 

    protected $connection = 'mongodb';
    protected $collection = 'locations';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id', 'name','coordinates','img'
    ];

    public function Company()
    {
        return $this->belongsTo(\App\Models\Company::class,'company_id','_id');
    }
}