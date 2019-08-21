<?php

namespace App\Models;

use App\Traits\UploadableTrait;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use UploadableTrait;
    
    protected $fillable = [
        'name',
        'image',
        'content'
    ];
}
