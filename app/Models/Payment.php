<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'payable_id',
        'payable_type',
        'purpose',
    ];

    /**
     * Get all of the owning reviewable models.
     */
    public function payable()
    {
        return $this->morphTo();
    }
}
