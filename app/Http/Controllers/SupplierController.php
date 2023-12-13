<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('addsupplier', [
            'title' => 'supplier',
            "supplier" => supplier::all()
        ]);
    }

    public function data($id)
    {
        $supplier = Supplier::find($id);
        return view('listsupplier', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addsupplier', [
            'supplier'=> supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telp' => 'required',
            'alamat' => 'required'
        ]);
        
        supplier::create($validatedData);
        return redirect('/listsupplier')->with('sukses', 'Supplier Baru Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        // return view('supplier.show', [
        //     'supplier'=> $beritum
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = supplier::with('product')->find($id);

        return view('editsupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request  $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telp' => 'required',
            'alamat' => 'required'
           
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update($validatedData);

        return redirect('/listsupplier')->with('sukses', 'Supplier Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy ($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('/listsupplier')->with('success','Data Terhapus');
    }
}
