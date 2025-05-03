<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_pizza = DB::table('order_pizza')
        ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
        ->select('order_pizza.*', 'pizza_size.size as pizza_size_name')
        ->get();

        return view('order_pizza.index', ['order_pizza' => $order_pizza]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = DB::table('orders')
        ->orderBy('id')
        ->get();

        $pizza_sizes = DB::table('pizza_size')
        ->orderBy('size')
        ->get();

        return view('order_pizza.new', ['orders' => $orders, 'pizza_sizes' => $pizza_sizes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('order_pizza')->insert([
            'order_id' => $request->order_id,
            'pizza_size_id' => $request->pizza_size_id,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        $order_pizza = DB::table('order_pizza')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select('order_pizza.*', 'pizza_size.size as pizza_size_name')
            ->get();
    
        return view('order_pizza.index', ['order_pizza' => $order_pizza]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order_pizza = DB::table('order_pizza')->find($id);

        $orders = DB::table('orders')->orderBy('id')->get();
        
        $pizza_sizes = DB::table('pizza_size')->orderBy('size')->get();
    
        return view('order_pizza.edit', [
            'order_pizza' => $order_pizza,
            'orders' => $orders,
            'pizza_sizes' => $pizza_sizes
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('order_pizza')
        ->where('id', $id)
        ->update([
            'order_id' => $request->order_id,
            'pizza_size_id' => $request->pizza_size_id,
            'quantity' => $request->quantity,
            'updated_at' => now()
        ]);

       
        $order_pizza = DB::table('order_pizza')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select('order_pizza.*', 'pizza_size.size as pizza_size_name')
            ->get();

        return view('order_pizza.index', ['order_pizza' => $order_pizza]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderPizza = DB::table('order_pizza')->where('id', $id);
        $orderPizza->delete();
    
        $order_pizzas = DB::table('order_pizza')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select('order_pizza.*', 'pizza_size.size as pizza_size_name')
            ->get();
    
        return view('order_pizza.index', ['order_pizza' => $order_pizzas]);
    }
}
