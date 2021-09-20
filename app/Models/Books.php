<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = ['title', 'description', 'author', 'pages'];

    protected $table = 'books';

    protected $casts = [
        'created_at' => 'datetime:d/m/Y'
    ];
}
