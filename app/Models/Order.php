<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id'
    ];

    protected $casts = [
        'status' => 'string',
        'delivery_type' => 'string'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function deliveryPerson()
    {
        return $this->belongsTo(Employee::class, 'delivery_person_id');
    }

    public function pizzas()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function extraIngredients()
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_extra_ingredient')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}