<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_pizza';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'pizza_size_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con los ingredientes extra
     */
    public function extraIngredients()
    {
        return $this->belongsToMany(
            ExtraIngredient::class,
            'order_pizza_extra_ingredient', // nombre de la tabla pivote
            'order_pizza_id',               // FK de order_pizza en la tabla pivote
            'extra_ingredient_id'           // FK de extra_ingredient en la tabla pivote
        )->withPivot('quantity');           // campo adicional en la tabla pivote
    }

    /**
     * Relación con el tamaño de pizza
     */
    public function pizzaSize()
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }

    /**
     * Relación con el pedido principal
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Accesor para calcular el precio total
     */
    public function getTotalPriceAttribute()
    {
        $basePrice = $this->pizzaSize->price ?? 0;
        $extraPrice = $this->extraIngredients->sum(function($ingredient) {
            return $ingredient->price * $ingredient->pivot->quantity;
        });
        
        return ($basePrice + $extraPrice) * $this->quantity;
    }
}