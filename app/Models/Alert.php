<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'database_notification',
        'sms_notification',
        'push_notification',
        'email_notification'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
