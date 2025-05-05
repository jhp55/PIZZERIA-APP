<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'
    ];

    // Relación con órdenes (pedidos)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relación con empleados
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}