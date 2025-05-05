<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterials extends Model
{
    use HasFactory;
    protected $table = 'raw_materials';
    protected $fillable = [
        'name',
        'unit',
        'current_stock',
        
    ];
}
