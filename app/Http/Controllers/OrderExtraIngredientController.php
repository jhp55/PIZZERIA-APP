<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderPizza;

class OrderExtraIngredientController extends Controller
{
    public function index()
    {
        $orderExtraIngredients = DB::table('order_extra_ingredient')
            ->join('orders', 'order_extra_ingredient.order_id', '=', 'orders.id')
            ->join('pizzas', 'order_extra_ingredient.extra_ingredient_id', '=', 'pizzas.id')
            ->select(
                'order_extra_ingredient.*',
                'orders.id as order_id',
                'pizzas.name as ingredient_name'
            )
            ->get();
        
        return view('order_extra_ingredient.index', compact('orderExtraIngredients'));
    }

    public function create()
    {
        $orders = DB::table('orders')->orderBy('id')->get();
        $extraIngredients = DB::table('pizzas')->orderBy('name')->get();

        return view('order_extra_ingredient.new', compact('orders', 'extraIngredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:pizzas,id',
            'quantity' => 'required|integer|min:1'
        ]);

        OrderExtraIngredient::create([
            'order_id' => $request->order_id,
            'extra_ingredient_id' => $request->extra_ingredient_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('order_extra_ingredient.index')
               ->with('success', 'Ingrediente extra añadido correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order_pizza = OrderPizza::with(['extraIngredients', 'pizzaSize'])->findOrFail($id);
        
        $orders = DB::table('orders')->orderBy('id')->get();
        $pizza_sizes = DB::table('pizza_size')->orderBy('size')->get();
        $extra_ingredients = DB::table('extra_ingredients')->orderBy('name')->get();
        
        return view('order_extra_ingredient.edit', [
            'order_pizza' => $order_pizza,
            'orders' => $orders,
            'pizza_sizes' => $pizza_sizes,
            'extra_ingredients' => $extra_ingredients
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('order_pizza')
          ->where('id', $id)
          ->update([
              'order_id' => $request->order_id,
              'pizza_size_id' => $request->pizza_size_id,
              'quantity' => $request->quantity,
              'updated_at' => now()
          ]);
        
        $extraIngredients = [];
        foreach ($request->extra_ingredients ?? [] as $ingId => $data) {
            if (isset($data['id'])) {
                $extraIngredients[$ingId] = ['quantity' => $data['quantity']];
            }
        }
        
        $orderPizza = OrderPizza::find($id);
        $orderPizza->extraIngredients()->sync($extraIngredients);
        
        return redirect()->route('order_pizza.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->delete();

        return redirect()->route('order_extra_ingredient.index')
               ->with('success', 'Ingrediente extra eliminado correctamente');
    }
}