<?php

namespace App\Models;

use App\Models\Product;
// use Spatie\Searchable\Searchable;
use Gerardojbaez\GeoData\Traits\HasCity;
use Gerardojbaez\GeoData\Traits\HasRegion;
use Gerardojbaez\GeoData\Traits\HasCountry;
use Gerardojbaez\GeoData\Contracts\HasCityContract;
use Gerardojbaez\GeoData\Contracts\HasRegionContract;
use Gerardojbaez\GeoData\Contracts\HasCountryContract;

class Store extends BaseModel implements HasCountryContract, HasRegionContract, HasCityContract
{
    use HasCountry, HasRegion, HasCity;

    const STATUS_BLOCKED = 2;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const PAID = 1;
    const UNPAID = 0;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phones',
        'email',
        'address',
        'description',
        'opening_hours',
        'color',
        'logo',
        'banner',
        'wallet_balance',
        'bank',
        'account_name',
        'account_number',
        'bank_code',
        'subaccount',
        'availability',
        'status',
        'registration',
        'country_code',
        'region_id',
        'city_id',
        'country_code',
        'latitude',
        'longitude',
        'agent_id',
        'vendor_id',
        'affiliate_id',
    ];

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function affiliate(){
        return $this->belongsTo(User::class, 'affiliate_id');
    }

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }

    /**
     * Product has many Review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->morphMany('App\Models\Review', 'reviewable');
    }

    //METODS FOR HANDLING STATUS

    public function status()
    {
        if($this->status == self::STATUS_ACTIVE){
            $status = 'active';
        }elseif($this->status == self::STATUS_INACTIVE){
            $status = 'inactive';
        }else{
            $status = 'blocked';
        }
        return $status;
    }

    public function isBlocked()
    {
        return ($this->status == self::STATUS_BLOCKED)?true:false;
    }

    public function isActive()
    {
        return ($this->status == self::STATUS_ACTIVE)?true:false;
    }

    public function isInactive()
    {
        return ($this->status == self::STATUS_INACTIVE)?true:false;
    }

    
}
