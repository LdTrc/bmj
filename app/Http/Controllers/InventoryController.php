<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\warranty;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inventories = inventory::all();
        $notifications = [];
        $currentDate = date("Y-m-d");
        $oneWeek = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+ 1 week" ) );
        foreach($inventories as $inventory){
            $warranties = warranty::where('inventory_id',$inventory->id)->get();
            
            foreach ($warranties as $warranty){
                $warranty->order_date = date("Y-m-d", strtotime($warranty->order_date));
                $warranty->endDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $warranty->order_date ) ) . "+".$warranty->warranty." month" ) );
                if($currentDate < $warranty->endDate && $warranty->endDate < $oneWeek){
                    $datetime2 = strtotime($warranty->endDate);
                    $datetime1 = strtotime($currentDate);

                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $day = $secs / 86400;
                    $warrantyItem = [
                        "productName" => $warranty->inventory->product->namabarang,
                        "quantity" => $warranty->quantity,
                        "order_date" => $warranty->order_date,
                        "endDate" => $warranty->endDate,
                        "days_left" => $day
                    ];
                    array_push($notifications,$warrantyItem);
                }
            }
        }
        
        return view('listInventory', [
            "inventories" => inventory::all(),
            "notifications" => $notifications,
            "notificationCount" => count($notifications)
        ]);
    }

    public function addindex()
    {
        return view('addinventory', [
            'title' => 'Add Inventory',
            'products' => product::all()
        ]);
    }

    public function addInventory(Request $request)
    {
        $validatedData = $request->validate([
            'quantity'=> 'required',
            'product_id' => 'required|max:255',
            'sell_price' => 'required',
            'warranty' => 'required',
            'order_date' => 'required',            
        ]);

        $getProduct = product::find($request->post('product_id'));
        if(!$getProduct){
            return ("error");
        }

        $inventory = inventory::where('product_id',$getProduct->id)->first();
        if($inventory){
            $inventory->quantity += $request->post('quantity');
            $inventory->sell_price = $request->post('sell_price');
            $inventory->save();
        }else{
            $inventory = inventory::create([
                'quantity' => $request->post('quantity'),
                'product_id' => $request->post('product_id'),
                'sell_price' => $request->post('sell_price'),
            ]);
        }
        
        $warranty = warranty::create([
            'order_date' => $request->post('order_date'),
            'warranty' => $request->post('warranty'),
            'quantity' => $request->post('quantity'),
            'buy_price' => $getProduct->price,
            'inventory_id' => $inventory->id,
        ]);

        $inventories = inventory::all();
        $notifications = [];
        $currentDate = date("Y-m-d");
        $oneWeek = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+ 1 week" ) );
        foreach($inventories as $inventory){
            $warranties = warranty::where('inventory_id',$inventory->id)->get();
            
            foreach ($warranties as $warranty){
                $warranty->order_date = date("Y-m-d", strtotime($warranty->order_date));
                $warranty->endDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $warranty->order_date ) ) . "+".$warranty->warranty." month" ) );
                if($currentDate < $warranty->endDate && $warranty->endDate < $oneWeek){
                    $datetime2 = strtotime($warranty->endDate);
                    $datetime1 = strtotime($currentDate);

                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $day = $secs / 86400;
                    $warrantyItem = [
                        "productName" => $warranty->inventory->product->namabarang,
                        "quantity" => $warranty->quantity,
                        "order_date" => $warranty->order_date,
                        "endDate" => $warranty->endDate,
                        "days_left" => $day
                    ];
                    array_push($notifications,$warrantyItem);
                }
            }
        }

        return view('listInventory', [
            "inventories" => $inventories,
            "notifications" => $notifications,
            "notificationCount" => count($notifications)
        ]);
    }

    public function editindex($id)
    {
        $inventory = inventory::find($id);
        $currentDate = date("Y-m-d");
        $warranties = warranty::where('inventory_id',$inventory->id)->get();
        foreach ($warranties as $warranty){
            $warranty->order_date = date("Y-m-d", strtotime($warranty->order_date));
            $warranty->endDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $warranty->order_date ) ) . "+".$warranty->warranty." month" ) );
            $warranty->status = "Active";
            if($warranty->endDate < $currentDate){
                $warranty->status = "Expired";
            }
        }
        return view('editinventory', [
            "inventory" => $inventory,
            "warranties" => $warranties,
        ]);
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
        return view('home', ['hasilRekomendasi' => $hasilRekomendasi, 'products' => $products]);
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
            'price' => 'required',            
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
            'price' => 'required',
            'quantity' => 'required',
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
