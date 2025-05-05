<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientsController extends Controller
{
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return view('extra_ingredients.index', compact('extraIngredients'));
    }

    public function create()
    {
        return view('extra_ingredients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99'
        ]);

        ExtraIngredient::create($validated);

        return redirect()->route('extra_ingredients.index')
            ->with('success', 'Ingrediente extra creado exitosamente');
    }

    public function show(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.show', compact('extraIngredient'));
    }

    public function edit(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.edit', compact('extraIngredient'));
    }

    public function update(Request $request, ExtraIngredient $extraIngredient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99'
        ]);

        $extraIngredient->update($validated);

        return redirect()->route('extra_ingredients.index')
            ->with('success', 'Ingrediente extra actualizado exitosamente');
    }

    public function destroy(ExtraIngredient $extraIngredient)
    {
        $extraIngredient->delete();

        return redirect()->route('extra_ingredients.index')
            ->with('success', 'Ingrediente extra eliminado exitosamente');
    }
}
