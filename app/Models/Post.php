<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify which fields can be mass assigned
    protected $fillable = [
        'title', 'body', 'user_id', // Make sure 'user_id' is fillable
    ];
}
