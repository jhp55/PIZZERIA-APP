<?php
namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use App\Models\Purchases;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\RawMaterials;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener las compras con sus relaciones
        $purchases = Purchases::with('supplier', 'rawMaterial')
            ->orderBy('purchase_date', 'desc')
            ->get();
            
        return view('purchases.index', ['purchases' => $purchases]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Suppliers::orderBy('name')->get();
        $rawMaterials = RawMaterials::orderBy('name')->get();
        
        return view('purchases.new', [
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
        $purchase = new Purchases();
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchase = Purchases::findOrFail($id);
        $suppliers = Suppliers::orderBy('name')->get();
        return view('purchase.edit', ['purchase' => $purchase, 'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchases::findOrFail($id);
    
        $purchase->product_name = $request->product_name;
        $purchase->quantity = $request->quantity;
        $purchase->price = $request->price;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->save();

        $purchases = Purchases::with('supplier')->get();

        return view('purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchases::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchases.index')
            ->with('success', 'Compra eliminada correctamente');
    }
}
