<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'token'
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
