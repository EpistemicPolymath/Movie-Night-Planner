<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Movie extends Model
{
    protected $table = 'movies';

    public $timestamps = true;

    protected $fillable = [
        'imdb_id',
        'title',
        'image_url',
        'runtime',
        'plot',
        'generas',
        'rating',
        'keywords',
    ];

    public function polls(): BelongsToMany
    {
        return $this->belongsToMany(Poll::class, 'movies_polls')
            ->using(MoviesPolls::class)
            ->withPivot([
                'submitted_by',
                'voting_eligible',
            ]);
    }
}
