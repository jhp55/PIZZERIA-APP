<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PizzaRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaRawMaterials = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name',
                'raw_materials.unit as raw_material_unit'
            )
            ->get();
            
        return view('pizza_raw_material.index', ['pizzaRawMaterials' => $pizzaRawMaterials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
                ->orderBy('name')
                ->get();
                
        $rawMaterials = DB::table('raw_materials')
                        ->orderBy('name')
                        ->get();
        
        return view('pizza_raw_material.new', [
            'pizzas' => $pizzas,
            'rawMaterials' => $rawMaterials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizzaRawMaterial = new PizzaRawMaterial();
        $pizzaRawMaterial->pizza_id = $request->pizza_id;
        $pizzaRawMaterial->raw_material_id = $request->raw_material_id;
        $pizzaRawMaterial->quantity = $request->quantity;
        $pizzaRawMaterial->save();

        $pizzaRawMaterials = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name',
                'raw_materials.unit as raw_material_unit'
            )
            ->get();

        return view('pizza_raw_material.index', ['pizzaRawMaterials' => $pizzaRawMaterials]);
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
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
    
        $pizzas = DB::table('pizzas')
                ->orderBy('name')
                ->get();
                
        $rawMaterials = DB::table('raw_materials')
                        ->orderBy('name')
                        ->get();
        
        return view('pizza_raw_material.edit', [
            'pizzaRawMaterial' => $pizzaRawMaterial,
            'pizzas' => $pizzas,
            'rawMaterials' => $rawMaterials
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
    
        $pizzaRawMaterial->pizza_id = $request->pizza_id;
        $pizzaRawMaterial->raw_material_id = $request->raw_material_id;
        $pizzaRawMaterial->quantity = $request->quantity;
        $pizzaRawMaterial->save();

        $pizzaRawMaterials = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name',
                'raw_materials.unit as raw_material_unit'
            )
            ->get();

        return view('pizza_raw_material.index', ['pizzaRawMaterials' => $pizzaRawMaterials]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
        $pizzaRawMaterial->delete();

        $pizzaRawMaterials = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name',
                'raw_materials.unit as raw_material_unit'
            )
            ->get();

        return view('pizza_raw_material.index', ['pizzaRawMaterials' => $pizzaRawMaterials]);
        }
}
