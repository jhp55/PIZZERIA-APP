<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use App\Models\Ingredient;
use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::with(['pizza', 'ingredient'])->get();
        return view('pizza_ingredients.index', compact('pizzaIngredients'));
    }

    public function create()
    {
        $pizzas = Pizzas::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.create', compact('pizzas', 'ingredients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id'
        ]);

        PizzaIngredient::create($validated);

        return redirect()->route('pizza_ingredients.index')
            ->with('success', 'Relación Pizza-Ingrediente creada exitosamente');
    }

    public function edit(PizzaIngredient $pizzaIngredient)
    {
        $pizzas = Pizzas::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.edit', compact('pizzaIngredient', 'pizzas', 'ingredients'));
    }

    public function update(Request $request, PizzaIngredient $pizzaIngredient)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id'
        ]);

        $pizzaIngredient->update($validated);

        return redirect()->route('pizza_ingredients.index')
            ->with('success', 'Relación Pizza-Ingrediente actualizada exitosamente');
    }

    public function destroy(PizzaIngredient $pizzaIngredient)
    {
        $pizzaIngredient->delete();

        return redirect()->route('pizza_ingredients.index')
            ->with('success', 'Relación Pizza-Ingrediente eliminada exitosamente');
    }
}