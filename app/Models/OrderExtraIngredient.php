<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtraIngredient extends Model
{
    use HasFactory;
    
    protected $table = 'order_extra_ingredient';
    
    protected $fillable = [
        'order_id', // Esta debe apuntar a orders.id según tu migración
        'extra_ingredient_id',
        'quantity',
    ];
    
    /**
     * Relación con Order (no con OrderPizza)
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    /**
     * Relación con el ingrediente extra
     */
    public function ingredient()
    {
        return $this->belongsTo(Pizza::class, 'extra_ingredient_id');
    }
}