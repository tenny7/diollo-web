<?php

namespace App\Models;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['promotion_id', 'path'];

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }
}
