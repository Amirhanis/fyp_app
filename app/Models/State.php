<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = "states";

    protected $fillables = [
        'name',
        'population',
        'territory',
        'avg_price',
        'description',
        'image',
        'continent'
    ];

    public $timestamps = true;
}
