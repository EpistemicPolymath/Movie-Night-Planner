<?php

declare(strict_types=1);

namespace App;

use App\Support\HasUuid;
use Illuminate\Database\Eloquent\Relations\Pivot;

final class MoviesPolls extends Pivot
{
    use HasUuid;

    public $timestamps = true;

    protected $fillable = [
        'uuid',
        'submitted_by',
        'movie_id',
        'poll_uuid',
        'voting_eligible',
    ];
}
