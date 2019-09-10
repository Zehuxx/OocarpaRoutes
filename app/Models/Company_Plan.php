<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Company_Plan extends Eloquent
{
	use SoftDeletes; 

    protected $connection = 'mongodb';
    protected $collection = 'companies_plans';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id', 'plan_id','start_date','end_date'
    ];

    public function Company()
    {
        return $this->belongsTo(\App\Models\Company::class,'company_id','_id');
    }

    public function Plan()
    {
        return $this->belongsTo(\App\Models\Plan::class,'plan_id','_id');
    }
}