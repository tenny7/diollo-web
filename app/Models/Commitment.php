<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Commitment extends Model
{
    const STATUS_COMMITED = 1;
    const STATUS_NOT_COMMITED = 0;
    protected $fillable = ['user_id', 'amount','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
