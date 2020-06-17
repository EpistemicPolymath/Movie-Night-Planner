<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid(): void
    {
        static::creating(static function (Model $model): void {
            if (!is_null($model->getKey())) {
                return;
            }
            $model->setAttribute('uuid', Str::uuid());
        });
    }

    protected function initializeHasUuid(): void
    {
        $this->setKeyType('string');
        $this->setIncrementing(false);
        $this->setKeyName('uuid');
    }
}
