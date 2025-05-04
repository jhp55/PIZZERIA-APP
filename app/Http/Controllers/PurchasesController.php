<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as material_name',
                'raw_materials.unit as material_unit'
            )
            ->orderBy('purchases.purchase_date', 'desc')
            ->get();
            
        return view('purchases.index', ['purchases' => $purchases]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = DB::table('suppliers')
                ->orderBy('name')
                ->get();
                
        $rawMaterials = DB::table('raw_materials')
                        ->orderBy('name')
                        ->get();
        
        return view('purchases.create', [
            'suppliers' => $suppliers,
            'rawMaterials' => $rawMaterials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
            'purchase_price' => 'required|numeric|min:0.01',
            'purchase_date' => 'required|date'
        ]);
    
        // Crear nueva compra
        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->raw_material_id = $request->raw_material_id;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_price = $request->purchase_price;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->save();
    
        // Actualizar el stock de la materia prima
        DB::table('raw_materials')
            ->where('id', $request->raw_material_id)
            ->increment('current_stock', $request->quantity);

        return redirect()->route('purchases.index')
            ->with('success', 'Compra registrada exitosamente');
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
        $purchase = Purchase::find($id);
        $suppliers = DB::table('suppliers')
            ->orderBy('name')
            ->get();
        return view('purchase.edit', ['purchase' => $purchase, 'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);
    
        $purchase->product_name = $request->product_name;
        $purchase->quantity = $request->quantity;
        $purchase->price = $request->price;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->save();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->select('purchases.*', 'suppliers.name as supplier_name')
            ->get();

        return view('purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        // Redireccionar al listado con mensaje de éxito
        return redirect()->route('purchases.index')
                        ->with('success', 'Compra eliminada correctamente');
    }
}
