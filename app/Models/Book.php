<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $connection ='mongodb';
    protected $collection ='my-books';

    protected $fillable = [
        "authors",
        "average_rating",
        "average_rating_rounded",
        "books_count",
        "id",
        "image",
        "image_medium",
        "isbn",
        "language_code",
        "original_publication_year",
        "original_series",
        "original_title",
        "ratings_count",
        "title",
    ];
}
