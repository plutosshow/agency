<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flats extends Model
{
    protected $fillable = [
        'rooms',
        'livedSquare',
        'commonSquare',
        'year',
        'type',
        'comments',
        'region',
        'district',
        'city',
        'street',
        'building',
        'zip'
    ];
}
