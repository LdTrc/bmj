<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\supplier;
use App\Models\datasupp;
use App\Models\units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('listproducts', [
            "products" => product::latest()->filter()->paginate(10),
        ]);
    }

    public function regisindex()
    {
        return view('regisproduct', [
            'datasupp' => datasupp::all(),
            'title' => 'product',
            'supplier'=> supplier::all(),
            'units'=> units::all()
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

    public function rekomendasiBarang(Request $request)
    {

        $cari = $request->input('cari');

        $products = product::when($cari, function ($query) use ($cari) {
            return $query->where('namabarang', 'like', "%$cari%");
        })->paginate(10);

        $hasilRekomendasi = [];

        foreach ($products as $product) {
            if (!isset($hasilRekomendasi[$product->namabarang])) {
            // Cari supplier terbaik untuk setiap barang
            $supplierTerbaik = DB::table('product')
                ->select('product.*', 'datasupp.namasupp')
                ->join('datasupp', 'product.supplierid', '=', 'datasupp.id')
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
        return view('home', ['hasilRekomendasi' => $hasilRekomendasi, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regisproduct', [
            'datasupp' => datasupp::all(),
            'supplier'=> supplier::all(),
            'units'=> units::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplierid'=> 'required',
            'satuanid' => 'required',
            'namabarang' => 'required|max:30',
            'discount' => 'required',
            'kualitas' => 'required',
            'price' => 'required',
            // 'inventory_id' => 'required',
            // 'quantity' => 'required',
            // 'warranty' => 'required',
            // 'order_date' => 'required',
            
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
        $datasupp = datasupp::all();
        $units = units::all();
        $product = product::with('supplier')->find($id);
        return view('editproduct', compact('supplier', 'product','units','datasupp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'supplierid'=> 'required',
            'namabarang' => 'required|max:30',
            'kualitas' => 'required',
            'discount' => 'required',
            'satuanid' => 'required',
            'price' => 'required',
            // 'inventory_id' => 'required',
            // 'quantity' => 'required',
            // 'warranty' => 'required',
            // 'order_date' => 'required',
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
