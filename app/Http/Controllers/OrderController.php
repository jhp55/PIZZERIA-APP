<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User; // Cliente
use App\Models\Branch;
use App\Models\Employee;
use App\Models\PizzaSize;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client', 'branch', 'deliveryPerson', 'pizzas', 'extraIngredients'])
                      ->latest()
                      ->get();
        
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = User::where('role', 'client')->get();
        $branches = Branch::all();
        $deliveryPeople = Employee::where('position', 'repartidor')->get();
        $pizzas = PizzaSize::with('pizza', 'size')->get();
        $extraIngredients = ExtraIngredient::all();
        
        return view('orders.create', compact(
            'clients', 
            'branches', 
            'deliveryPeople',
            'pizzas',
            'extraIngredients'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'pizzas' => 'sometimes|array',
            'pizzas.*.id' => 'required|exists:pizza_sizes,id',
            'pizzas.*.quantity' => 'required|integer|min:1',
            'extra_ingredients' => 'sometimes|array',
            'extra_ingredients.*.id' => 'required|exists:extra_ingredients,id',
            'extra_ingredients.*.quantity' => 'required|integer|min:1'
        ]);

        $order = Order::create($validated);

        if (isset($validated['pizzas'])) {
            foreach ($validated['pizzas'] as $pizza) {
                $order->pizzas()->attach($pizza['id'], ['quantity' => $pizza['quantity']]);
            }
        }

        if (isset($validated['extra_ingredients'])) {
            foreach ($validated['extra_ingredients'] as $ingredient) {
                $order->extraIngredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
            }
        }

        return redirect()->route('orders.index')
            ->with('success', 'Pedido creado exitosamente');
    }

    public function show(Order $order)
    {
        $order->load(['client', 'branch', 'deliveryPerson', 'pizzas.pizza', 'pizzas.size', 'extraIngredients']);
        
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = User::where('role', 'client')->get();
        $branches = Branch::all();
        $deliveryPeople = Employee::where('position', 'repartidor')->get();
        $pizzas = PizzaSize::with('pizza', 'size')->get();
        $extraIngredients = ExtraIngredient::all();
        
        $order->load(['pizzas', 'extraIngredients']);
        
        return view('orders.edit', compact(
            'order',
            'clients', 
            'branches', 
            'deliveryPeople',
            'pizzas',
            'extraIngredients'
        ));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'pizzas' => 'sometimes|array',
            'pizzas.*.id' => 'required|exists:pizza_sizes,id',
            'pizzas.*.quantity' => 'required|integer|min:1',
            'extra_ingredients' => 'sometimes|array',
            'extra_ingredients.*.id' => 'required|exists:extra_ingredients,id',
            'extra_ingredients.*.quantity' => 'required|integer|min:1'
        ]);

        $order->update($validated);

        if (isset($validated['pizzas'])) {
            $pizzasData = [];
            foreach ($validated['pizzas'] as $pizza) {
                $pizzasData[$pizza['id']] = ['quantity' => $pizza['quantity']];
            }
            $order->pizzas()->sync($pizzasData);
        } else {
            $order->pizzas()->detach();
        }

        // Sincronizar ingredientes extra
        if (isset($validated['extra_ingredients'])) {
            $extrasData = [];
            foreach ($validated['extra_ingredients'] as $ingredient) {
                $extrasData[$ingredient['id']] = ['quantity' => $ingredient['quantity']];
            }
            $order->extraIngredients()->sync($extrasData);
        } else {
            $order->extraIngredients()->detach();
        }

        return redirect()->route('orders.index')
            ->with('success', 'Pedido actualizado exitosamente');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Sucursal eliminada exitosamente');
    }
}