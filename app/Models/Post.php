<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify which fields can be mass assigned
    protected $fillable = [
        'title',
        'body',
        '_token', // (optional) though you shouldn't typically need to add this
    ];
}
