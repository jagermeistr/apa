<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farmer extends User
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    use HasFactory;
}
