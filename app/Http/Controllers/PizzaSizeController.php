<?php

namespace App\Http\Controllers;

use App\Models\Pizza_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_size = DB::table('pizza_size')
        ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
        ->select('pizza_size.*', 'pizzas.name as pizza_name') // ← ALIAS AQUÍ
        ->get();

    return view('pizza_size.index', ['pizza_size' => $pizza_size]);
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
