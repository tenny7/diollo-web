<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_COMPLETED = 2;

    protected $fillable = [
        'store_id', 'email', 'phone', 'region_id', 'started', 'duration', 'status', 'impressions', 'views'
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
}
