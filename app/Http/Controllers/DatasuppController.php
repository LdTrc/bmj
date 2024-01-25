<?php

namespace App\Http\Controllers;

use App\Models\datasupp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatasuppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listsupp', [  
            'title' => 'supplier',
            "datasupp" => datasupp::latest()->filter()->paginate(10)
        ]);
    }

    public function cetakbestsupp()
    {
        return view('cetakbestsupp', [  
            "datasupp" => datasupp::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addsupp', [
            'datasupp'=> datasupp::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namasupp' => 'required|max:30',
            'notelp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'lokasi' => 'required',
            'pengiriman' => 'required',
            'diskon' => 'required',
            'garansi' => 'required',
           
        ]);
        
        datasupp::create($validatedData);
        return redirect('/listsupp')->with('sukses', 'Supplier Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(datasupp $datasupp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datasupp = datasupp::with('product')->find($id);

        return view('editsupp', compact('datasupp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namasupp' => 'required|max:30',
            'notelp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'lokasi' => 'required',
            'pengiriman' => 'required',
            'diskon' => 'required',
            'garansi' => 'required'
        ]);

        $datasupp = datasupp::findOrFail($id);
        $datasupp->update($validatedData);

        return redirect('/listsupp')->with('sukses', 'Supplier Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datasupp = datasupp::findOrFail($id);
        $datasupp->delete();
        return redirect('/listsupp')->with('success','Data Terhapus');
    }
}
