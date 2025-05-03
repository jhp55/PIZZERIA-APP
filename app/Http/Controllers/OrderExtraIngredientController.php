<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_extra_ingredients = DB::table('order_extra_ingredient')
        ->join('orders', 'order_extra_ingredient.order_id', '=', 'orders.id')
        ->join('extra_ingredients', 'order_extra_ingredient.extra_ingredient_id', '=', 'extra_ingredients.id')
        ->select(
            'order_extra_ingredient.*', 
            'orders.id as order_id',
            'extra_ingredients.id as extra_ingredient_id',
            'extra_ingredients.name as extra_ingredient_name' 
        )
        ->get();
    
        return view('order_extra_ingredient.index', compact('order_extra_ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = DB::table('orders')->orderBy('id')->get();
        $extra_ingredients = DB::table('extra_ingredients')->orderBy('name')->get();

        return view('order_extra_ingredient.new', [
            'orders' => $orders,
            'extra_ingredients' => $extra_ingredients
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderExtraIngredient = new OrderExtraIngredient();
        $orderExtraIngredient->order_id = $request->order_id;
        $orderExtraIngredient->extra_ingredient_id = $request->extra_ingredient_id;
        $orderExtraIngredient->quantity = $request->quantity;
        $orderExtraIngredient->save();

        $orderExtraIngredients = DB::table('order_extra_ingredient')
            ->join('orders', 'order_extra_ingredient.order_id', '=', 'orders.id')
            ->join('extra_ingredients', 'order_extra_ingredient.extra_ingredient_id', '=', 'extra_ingredients.id')
            ->select('order_extra_ingredient.*', 'orders.order_number', 'extra_ingredients.name as ingredient_name')
            ->get();

        return view('order_extra_ingredient.index', ['orderExtraIngredients' => $orderExtraIngredients]);
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
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        $orderExtraIngredient->delete();

        $orderExtraIngredients = DB::table('order_extra_ingredient')
            ->join('orders', 'order_extra_ingredient.order_id', '=', 'orders.id')
            ->join('extra_ingredients', 'order_extra_ingredient.extra_ingredient_id', '=', 'extra_ingredients.id')
            ->select('order_extra_ingredient.*', 'orders.order_number', 'extra_ingredients.name as ingredient_name')
            ->get();

        return view('order_extra_ingredient.index', ['orderExtraIngredients' => $orderExtraIngredients]);
        
    }
}
