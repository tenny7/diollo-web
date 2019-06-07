<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['bank', 'code', 'longcode', 'type', 'pay_with_bank','currency','gateway','slug'];


}
