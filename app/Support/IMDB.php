<?php

declare(strict_types=1);

namespace App\Support;

use App\Movie;
use Illuminate\Support\Facades\Http;
use stdClass;

final class IMDB
{
    public static function findFromMovieID(string $imdbId): Movie
    {
        return static::movieFromObject(
            Http::get(sprintf('https://imdb-api.com/en/API/Title/%s/%s', config('services.imdb.key'), $imdbId))->object()
        );
    }

    public static function movieFromObject(stdClass $input): Movie
    {
        return new Movie([
            'imdb_id' => $input,
            'title' => $input->fullTitle,
            'image_url' => $input->image,
            'runtime' => $input->runtimeStr,
            'plot' => $input->plot,
            'genres' => $input->genres,
            'rating' => $input->contentRating,
            'keywords' => implode(', ', array_map('ucwords', $input->keywordList)),
        ]);
    }
}
