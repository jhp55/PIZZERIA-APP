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
