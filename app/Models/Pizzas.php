<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $fillable = [
        'name',
    ];
    
}
