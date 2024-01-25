<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('listunits', [
            'title' => 'listunits',
            "units" => units::all()
        ]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addunits', [
            'title' => 'addunits',
            'units'=> units::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'satuan' => 'required|max:30',
        ]);
        
        Units::create($validatedData);
        return redirect('/listunits')->with('sukses', 'Unit Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $units = units::all();
        $units = units::find($id);
        return view('editunits', compact('units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'satuan' => 'required',
        ]);
        $units = units::findOrFail($id);
        $units->update($validatedData);
        return redirect('/listunits')->with('sukses', 'Unit Baru Berhasil DiUpdate!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(units $units)
    {
        //
    }
}
