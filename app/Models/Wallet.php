<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Wallet extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'balance',
        'pending'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logAll()->useLogName('Wallet')->setDescriptionForEvent(fn(string $eventName) => "Wallet no-".$this->id." has been {$eventName}");
    }

    public function accountable () {
        return $this->morphTo();
    }

    public function transactions () {
        return $this->hasMany(Transaction::class);
    }
}
