<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_COMPLETED = 2;

    protected $fillable = [
        'store_id', 'region_id', 'started', 'status','end_date',
        'promo_type','promo_image'
    ];

    public function isActive()
    {
        return ($this->status == self::STATUS_ACTIVE)?true:false;
    }

    public function isInactive()
    {
        return ($this->status == self::STATUS_INACTIVE)?true:false;
    }

    public function isCompleted()
    {
        return ($this->status == self::STATUS_COMPLETED)?true:false;
    }

    public function photos()
    {
        return $this->belongsToMany(Image::class)->withPivot('promotion_id');
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
