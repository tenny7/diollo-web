<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review_text',
        'rating_id',
        'publish_as',
        'title',
        'rating',
        'user_id',
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
