<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Add a protected fillable property to allow laravel to do API post-requests
    protected $fillable = [
        'title', 'content'
    ];
}
