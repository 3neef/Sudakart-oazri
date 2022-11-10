<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuid
{
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->setAttribute('uuid', Uuid::uuid4()->toString());
        });
    }
}
