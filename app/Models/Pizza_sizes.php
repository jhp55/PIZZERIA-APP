<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza_size extends Model
{
    use HasFactory;
    protected $table = 'pizza_size';
    protected $fillable = [
        'pizza_id',
        'size',
        'price',
    ];
}
