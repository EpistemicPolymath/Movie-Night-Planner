<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Http;

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
        'genres',
        'rating',
        'keywords',
    ];

    public static function fetchFromImdb(string $imdbId): self
    {
        $imdbInfo = Http::get(sprintf('https://imdb-api.com/en/API/Title/%s/%s', config('services.imdb.key'), $imdbId))->object();
        return new self([
            'imdb_id' => $imdbId,
            'title' => $imdbInfo->fullTitle,
            'image_url' => $imdbInfo->image,
            'runtime' => $imdbInfo->runtimeStr,
            'plot' => $imdbInfo->plot,
            'genres' => $imdbInfo->genres,
            'rating' => $imdbInfo->contentRating,
            'keywords' => implode(', ', array_map('ucwords', $imdbInfo->keywordList))
        ]);
    }

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
