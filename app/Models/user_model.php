<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_model extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'email',
        'phone',
        'occupation',
        'remarks',
    ];
}
