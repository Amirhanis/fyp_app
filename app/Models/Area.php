<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = "areas";

    protected $fillables = [
        'name',
        'image',
        'price',
        'num_days',
        'country_id',
    ];

    public $timestamps = true;
}