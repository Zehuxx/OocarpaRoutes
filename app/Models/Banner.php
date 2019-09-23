<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\Company_Plan as CompanyPlan;

class Banner extends Eloquent
{
	use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'banners';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id', 'img',
    ];

    public function Company()
    {
        return $this->belongsTo(\App\Models\Company::class,'company_id','company_id');
    }

    static function getBanner() {
        $plansBuyed = CompanyPlan::all();
        $banners = [];

        foreach ($plansBuyed as  $value) {
            if (Carbon::now() < (new Carbon($value->end_date))) {
                foreach ($value->Company->Banner as $ban ) {
                    $banners[] = $ban->img;
                }
            }
        }

        if (count($banners) > 0) {
            $banner = $banners[array_rand($banners)];
        } else {
            $banner = 'default.jpg';
        }

        return $banner;
    }
}
