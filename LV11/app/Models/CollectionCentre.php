<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionCentre extends Model
{
    use HasFactory;
    public static function getCount()
    {
        return self::count();
    }
   
    protected $guarded=[];
}


