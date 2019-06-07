<?php

namespace App\Models;

use App\Models\Wishlist;
use App\Models\VerifyUser;
use App\Models\ReferralLink;
use App\Models\ReferralProgram;

use App\Models\AgentApplication;
use App\Models\ReferralRelationship;
use Gerardojbaez\GeoData\Traits\HasCity;
use Illuminate\Notifications\Notifiable;
use Gerardojbaez\GeoData\Traits\HasRegion;
use Gerardojbaez\GeoData\Traits\HasCountry;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Gerardojbaez\GeoData\Contracts\HasCityContract;
use Gerardojbaez\GeoData\Contracts\HasRegionContract;
use Gerardojbaez\GeoData\Contracts\HasCountryContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasCountryContract, HasRegionContract, HasCityContract
{
    // MustVerifyEmail
    use Notifiable, HasCountry, HasRegion, HasCity;
    

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 0;

    const ROLE_ADMIN = 5;
    const ROLE_AGENT = 2;
    const ROLE_VENDOR = 3;
    const ROLE_AFFILIATE = 4;
    const ROLE_CUSTOMER = 1;

    const STATUS_BLOCKED = 2;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_SUSPENDED = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone',
        'birthday', 'image_path', 'valid_id', 'gender', 'status', 'delete_due_date',
        'street', 'city_id', 'region_id', 'country_code', 
        'tax_no', 
        'wallet_balance',
        'bank',
        'account_name',
        'account_number',
        'bank_code',
        'subaccount',
        'email_verified_at',
        'referral_earnings'
    ];

    /**
     * The attributes that are casted as a Carbon date.
     *
     * @var array
     */
    protected $dates = [
        'birthday', 'delete_due_date', 'email_verified_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getImagePathAttribute()
    {
        // return new LocalFile($this->attributes['image_path']);
    } 

    public function agentStores()
    {
        return $this->hasMany(Store::class, 'agent_id');
    }

    public function agentProducts()
    {
        return $this->hasMany(Product::class, 'agent');
    }

    public function vendorStores()
    {
        return $this->hasMany(Store::class, 'vendor_id');
    }

    public function vendorProducts()
    {
        return $this->hasMany(Product::class, 'agent_id');
    }

    public function agentApplications()
    {
        return $this->hasOne(AgentApplication::class)->latest();
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

    public function rating()
    {
        return number_format($this->reviews()->avg('rating'), 2);
    }

    /**
     * User has many Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isInWishlist($productId)
    {
        $wishList = Wishlist::where('user_id', '=', $this->attributes['id'])
            ->where('product_id', '=', $productId)->get();
        if (count($wishList) <= 0) {
            return false;
        }
        return true;
    }
    
    public function isAdmin()
    {
        return ($this->role == self::ROLE_ADMIN)?true:false;
    }

    public function isAgent()
    {
        return ($this->role == self::ROLE_AGENT)?true:false;
    }

    public function isVendor()
    {
        return ($this->role == self::ROLE_VENDOR)?true:false;
    }

    public function isAffiliate()
    {
        return ($this->role == self::ROLE_AFFILIATE)?true:false;
    }

    public function isCustomer()
    {
        return ($this->role == self::ROLE_CUSTOMER)?true:false;
    }

    public function hasRole($role)
    {
        switch ($role) {
            case 'admin':
                return ($this->role == self::ROLE_ADMIN)?true:false;
                break;
            case 'agent':
                return ($this->role == self::ROLE_AGENT)?true:false;
                break;
            case 'vendor':
                return ($this->role == self::ROLE_VENDOR)?true:false;
                break;
            case 'affiliate':
                return ($this->role == self::ROLE_AFFILIATE)?true:false;
                break;
            default:
                return ($this->role == self::ROLE_CUSTOMER)?true:false;
                break;
        }
    }

    // public function role($role)
    // {
    //     switch ($role) {
    //         case self::ROLE_ADMIN:
    //             return 'admin';
    //             break;
    //         case self::ROLE_AGENT:
    //             return 'agent';
    //             break;
    //         case self::ROLE_VENDOR:
    //             return 'vendor';
    //             break;
    //         case self::ROLE_AFFILIATE:
    //             return 'affiliate';
    //             break;
    //         default:
    //             return 'customer';
    //             break;
    //     }
    // }

    public function redirectTo()
    {
        switch ($this->role) {
            case self::ROLE_ADMIN:
                return '/admin/dashboard';
                break;
            case self::ROLE_AGENT:
                return '/agent/dashboard';
                break;
            case self::ROLE_VENDOR:
                return '/vendor/dashboard';
                break;
            case self::ROLE_AFFILIATE:
                return '/affiliate/dashboard';
                break;
            default:
                return '/';
                break;
        }
    }

    //METHODS FOR HANDLING GENDER
    public function gender()
    {
        return ($this->gender == self::GENDER_FEMALE)?'female':'male';
    }

    public function isMale()
    {
        return ($this->status == self::GENDER_MALE)?true:false;
    }

    public function isFemale()
    {
        return ($this->status == self::GENDER_FEMALE)?true:false;
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

    public function isSuspended()
    {
        return ($this->status == self::STATUS_SUSPENDED)?true:false;
    }

    /**
     * The roles that belong to the user.
     */
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function hasRole($role)
    // {
    //     return $this->roles()->filter(function (Role $role) {
    //         return $role->name == $role;
    //     })->count();e
    // }

    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }


    public function refferalrelationships()
    {
        return $this->hasMany(ReferralRelationship::class);
    }
    // public function getReferralRelationship()
    // {
    //     return ReferralRelationship::all()->map(function ($referredUser) 
    //     {
    //         // return $referredUser->user_id;
    //         $data = [
    //             'id' => $referredUser->user_id
    //         ];
    //         $users = User::whereIn('id', $data)->get();
    //         // dd($users);
    //         return $users;
    //     });
    // }

    // public function showReferredUser($userId)
    // {
    //     // dd($userId);
    //     //  $users = User::whereIn('id', $userId)->get();
    //     // //  dd($users);
    //     //  return $users;
    // }

    public function addCredits($value)
    {
        $this->wallet_balance = $value;
        return $this->save();
    }

    // public function referrals()
    // {
    //     return $this->hasOne(ReferralRelationship::class, 'referree_user_id');
    // }

    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }
    

    
}
