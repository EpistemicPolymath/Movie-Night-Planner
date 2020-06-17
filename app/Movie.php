<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
