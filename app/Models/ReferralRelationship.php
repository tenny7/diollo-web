<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReferralRelationship extends Model
{
    protected $fillable = ['referral_link_id', 'user_id']; 

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
