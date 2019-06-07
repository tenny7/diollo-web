<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AgentApplication extends Model
{
    const STATUS_APPROVED = 2;
    const STATUS_DENIED = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'user_id', 'computer_use', 'interest', 'method', 'relationship', 'objection', 'photo', 'recognition', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicationStatus()
    {
        switch ($this->status) {
            case self::STATUS_APPROVED:
                return 'approved';
                break;
            case self::STATUS_DENIED:
                return 'denied';
                break;
            default:
                return 'pending';
                break;
        }
    }
}
