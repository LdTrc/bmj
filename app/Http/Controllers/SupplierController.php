<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          return view('addsupplier', [
            'title' => 'supplier',
            "supplier" => supplier::all()
        ]);
        // $cari = $request->query('cari');

        // if(!empty($cari)){
        //     $dataSupplier = ModeLmhs::sortable()
        //     ->where('supplier.supnama','nama', '%', $cari, '%')
        //     ->orwhere('supplier.suptelp','telp', '%', $cari, '%');
        // }else{
        //     $dataSupplier = Model
        // }

      
    }

    public function data($id)
    {
        // $supplier = Supplier::find($id);
        // return view('listsupplier', compact('supplier'));
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
            'telp' => 'required|numeric',
            'alamat' => 'required',
            'kecpengiriman' => 'required|numeric|between:1,3',
            'tdiskon' => 'required|numeric|between:1,3',
            'pelayanan' => 'required|numeric|between:1,3',
            'garansi' => 'required|numeric|between:1,3',
            'keaslian' => 'required|numeric|between:1,3',
            'tpembayaran' => 'required|numeric|between:1,3'
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
            'telp' => 'required|numeric',
            'alamat' => 'required',
            'kecpengiriman' => 'required|numeric|between:1,3',
            'tdiskon' => 'required|numeric|between:1,3',
            'pelayanan' => 'required|numeric|between:1,3',
            'garansi' => 'required|numeric|between:1,3',
            'keaslian' => 'required|numeric|between:1,3',
            'tpembayaran' => 'required|numeric|between:1,3'
           
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

    public function rekomendasiSupplier(Request $request)
    {
        $cari = $request->input('cari');

        $suppliers = supplier::when($cari, function ($query) use ($cari) {
            return $query->where('nama', 'like', "%$cari%");
        })->paginate(10);
        
        $hasilRekomendasi = [];
        
        $bobotKecepatanPengiriman = 0.25;
        $bobotTingkatDiskon = 0.15;
        $bobotPelayanan = 0.05;
        $bobotGaransi = 0.05;
        $bobotKeaslian = 0.20;
        $bobotTempoPembayaran = 0.10;

        $datasupp = [];

        foreach ($suppliers as $supplier) {
            $totalSkor = $bobotKecepatanPengiriman * $supplier->kecpengiriman +
            $bobotTingkatDiskon * $supplier->tdiskon +
            $bobotPelayanan * $supplier->pelayanan +
            $bobotGaransi * $supplier->garansi +
            $bobotKeaslian * $supplier->keaslian +
            $bobotTempoPembayaran * $supplier->tpembayaran;

            $hasilRekomendasi[$supplier->nama] = $totalSkor;
        
            $datasupp[$supplier->nama] = [
                'telp' => $supplier->telp,
                'alamat' => $supplier->alamat,
                'kecpengiriman' => $supplier->kecpengiriman,
                'tdiskon' => $supplier->tdiskon,
                'pelayanan' => $supplier->pelayanan,
                'garansi' => $supplier->garansi,
                'keaslian' => $supplier->keaslian,
                'tpembayaran' => $supplier->tpembayaran,
            ];
        }

        arsort($hasilRekomendasi);
        
        return view('datasupp', ['hasilRekomendasi'=>$hasilRekomendasi, 'datasupp' => $datasupp, 'suppliers' => $suppliers]);
    }
}
    