<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use App\Models\PizzaSizes;
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
        ->select('pizza_size.*', 'pizzas.name as pizza_name') 
        ->get();

        return view('pizza_size.index', ['pizza_size' => $pizza_size]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = Pizzas::all();
        return view('pizza_size.new', ['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza_size = new PizzaSizes();
        $pizza_size->pizza_id = $request->pizza_id;
        $pizza_size->size = $request->size;
        $pizza_size->price = $request->price;
        $pizza_size->save();

        $pizza_size = DB::table('pizza_size')

            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name') 
            ->get();

        return view('pizza_size.index', ['pizza_size' => $pizza_size]);
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
        $pizza_size = PizzaSizes::find($id);
        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();
        return view('pizza_size.edit',['pizza_size' => $pizza_size, 'pizzas' => $pizzas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza_size = PizzaSizes::find($id);
        $pizza_size->pizza_id = $request->pizza_id;
        $pizza_size->size = $request->size;
        $pizza_size->price = $request->price;
        $pizza_size->save();

        
        $pizza_size = DB::table('pizza_size')

            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name') 
            ->get();

        return view('pizza_size.index', ['pizza_size' => $pizza_size]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza_size = PizzaSizes::find($id);
        $pizza_size -> delete();

        $pizza_size = DB::table('pizza_size')

        ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
        ->select('pizza_size.*', 'pizzas.name as pizza_name') 
        ->get();

    return view('pizza_size.index', ['pizza_size' => $pizza_size]);
    }
}
