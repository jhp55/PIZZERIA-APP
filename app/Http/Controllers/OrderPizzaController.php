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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
