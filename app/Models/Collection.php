<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'my_collections';

    protected $fillable = [
        'name',
        'user_id',
        'books' => 'array',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
