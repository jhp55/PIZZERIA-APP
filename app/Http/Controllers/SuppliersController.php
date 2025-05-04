<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = DB::table('suppliers')
        ->select('suppliers.*')
        ->get();
        return view('supplier.index', ['suppliers' => $suppliers]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = DB::table('suppliers')
        ->orderBy('name')
        ->get();
        return view('supplier.new', ['suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = new Suppliers();
        $supplier->name = $request->name;
        $supplier->contact_info = $request->contact_info;
        $supplier->save();

        $suppliers = Suppliers::all(); // Obtener todos los proveedores
        return view('supplier.index', ['suppliers' => $suppliers]);
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
        $supplier = Suppliers::findOrFail($id);
        return view('supplier.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Suppliers::find($id);
    
        $supplier->name = $request->name;
        $supplier->contact_info = $request->contact_info;
        $supplier->save();
    
        $suppliers = Suppliers::all();
        return view('supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();

        $suppliers = Suppliers::all();
        return view('supplier.index', ['suppliers' => $suppliers]);
    }
}
