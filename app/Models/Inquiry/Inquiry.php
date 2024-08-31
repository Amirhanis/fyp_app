<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = "inquiries";

    protected $fillable = [
        'name',
        'destination',
        'type',
        'description',
        'user_id',
        'status',
    ];

    public $timestamps = true;
}
