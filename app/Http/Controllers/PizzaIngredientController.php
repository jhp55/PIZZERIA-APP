<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index(Pizza $pizza)
    {
        $ingredients = $pizza->ingredients;
        $availableIngredients = Ingredient::whereNotIn('id', $ingredients->pluck('id'))->get();
        
        return view('pizzas.ingredients.index', compact('pizza', 'ingredients', 'availableIngredients'));
    }

    public function store(Request $request, Pizza $pizza)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id'
        ]);

        $pizza->ingredients()->attach($request->ingredient_id);

        return redirect()->route('pizzas.ingredients.index', $pizza)
            ->with('success', 'Ingrediente agregado exitosamente');
    }

    public function destroy(Pizza $pizza, Ingredient $ingredient)
    {
        $pizza->ingredients()->detach($ingredient->id);

        return redirect()->route('pizzas.ingredients.index', $pizza)
            ->with('success', 'Ingrediente removido exitosamente');
    }
}