<?php

declare(strict_types=1);

namespace App;

use App\Support\HasUuid;
use Illuminate\Database\Eloquent\Model;

final class Poll extends Model
{
    use HasUuid;

    protected $table = 'polls';

    public $timestamps = true;

    protected $dates = [
        'submissions_close_at',
        'voting_closes_at',
    ];

    protected $fillable = [
        'uuid',
        'created_by',
        'event_title',
        'submissions_close_at',
        'voting_closes_at',
    ];
}
