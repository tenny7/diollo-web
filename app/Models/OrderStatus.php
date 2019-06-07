<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends BaseModel
{
    protected $fillable = ['name', 'is_default'];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
