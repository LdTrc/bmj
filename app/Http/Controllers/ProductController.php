<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listproducts', [
            'title' => 'product',
            "product" => product::all()
        ]);
    }

    public function regisindex()
    {
        return view('regisproduct', [
            'title' => 'product',
            'supplier'=> supplier::all()
        ]);
    }

    public function data($id)
    {
        $product = Product::find($id);
        return view('listproducts', compact('product'));
    }

    public function indexdata()
    {
        return view('data', [
            'title' => 'data',
            "product" => product::all()
        ]);
    }
    
    public function dataproduct($id)
    {
        $product = product::find($id);
        return view('data', compact('product'));
    }

    public function rekomendasiBarang()
    {
        $product = Product::all();

        $hasilRekomendasi = [];

        foreach ($product as $product) {
            if (!isset($hasilRekomendasi[$product->namabarang])) {
            // Cari supplier terbaik untuk setiap barang
            $supplierTerbaik = DB::table('product')
                ->select('product.*', 'supplier.nama')
                ->join('supplier', 'product.supplierid', '=', 'supplier.id')
                ->where('product.namabarang', $product->namabarang)
                ->orderBy('product.price')
                ->orderByDesc('product.kualitas')
                ->first();

                
                if ($supplierTerbaik) {
                    $hasilRekomendasi[$product->namabarang][] = $supplierTerbaik;
                }
            }
        }
        // ($supplierTerbaik);
        return view('home', ['hasilRekomendasi' => $hasilRekomendasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regisproduct', [
            'supplier'=> supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplierid'=> 'required',
            'namabarang' => 'required|max:255',
            'kualitas' => 'required',
            'satuan' => 'required',
            'price' => 'required'
            
        ]);
        
        Product::create($validatedData);
        return redirect('/listproducts')->with('sukses', 'Produk Baru Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = supplier::all();

        $product = product::with('supplier')->find($id);
        return view('editproduct', compact('supplier', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'supplierid' => 'required',
            'namabarang' => 'required|max:255',
            'kualitas' => 'required',
            'satuan' => 'required',
            'price' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->update($validatedData);

        return redirect('/listproducts')->with('sukses', 'Produk Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect('/listproducts')->with('success','Data Terhapus');
    }
}
