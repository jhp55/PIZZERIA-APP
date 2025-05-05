<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaRawMaterial extends Model
{
    use HasFactory;

    protected $table = 'pizza_raw_material';
    protected $fillable = [
        'pizza_id',
        'raw_material_id',
        'quantity',
    ];

    /**
     * Relación con la pizza
     */
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    /**
     * Relación con la materia prima
     */
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
}
