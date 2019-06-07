<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'body',
        'rating',
        'reviewable_id',
        'reviewable_type',
    ];

    /**
     * Get all of the owning reviewable models.
     */
    public function reviewable()
    {
        return $this->morphTo();
    }
}
