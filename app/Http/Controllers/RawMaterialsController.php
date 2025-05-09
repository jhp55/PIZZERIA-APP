<?php

namespace App\Http\Controllers;

use App\Models\RawMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raw_materials = DB::table('raw_materials')
        ->select('raw_materials.*')
        ->get();
        return view('raw_materials.index', ['raw_materials' => $raw_materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $raw_materials = DB::table('raw_materials')
        ->orderBy('name')
        ->get();
        return view('raw_materials.new', ['raw_materials' => $raw_materials]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $raw_material = new RawMaterials();
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->current_stock = $request->current_stock;
        $raw_material->save();

        $raw_materials = RawMaterials::orderBy('name')->get();
        return view('raw_materials.index', ['raw_materials' => $raw_materials]);
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
        $raw_materials = RawMaterials::findOrFail($id);
        return view('raw_materials.edit', ['raw_materials' => $raw_materials]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $raw_materials = RawMaterials::find($id);
        $raw_materials->name = $request->name;
        $raw_materials->unit = $request->unit;
        $raw_materials->current_stock = $request->current_stock;
        $raw_materials->save();

        $raw_materials = RawMaterials::orderBy('name')->get();
        return view('raw_materials.index', ['raw_materials' => $raw_materials]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $raw_materials = RawMaterials::find($id);
        $raw_materials->delete();

        $raw_materials = RawMaterials::orderBy('name')->get();
        return view('raw_materials.index', ['raw_materials' => $raw_materials]);
    }
}
