<?php

declare(strict_types=1);

namespace App;

use App\Support\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'title',
        'description',
        'submissions_close_at',
        'voting_closes_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
