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
