<?php

namespace App\Http\Controllers;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListsupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index(Request $request)
    {
        // $cari = $request->query('cari');

        // if(!empty($cari)){
        //     $suppliers = supplier::sortable()
        //     ->where('nama', 'like', '%'.$cari.'%')
        //     ->orWhere('alamat', 'like', '%'.$cari.'%')
        //     ->paginate(10)->onEachSide(2)->fragment('supplier');
        // }else{
        //     $suppliers = supplier::sortable()->paginate(10)->onEachSide(2)->fragment('suppliers');
        // }


        // $suppliers = DB::table('supplier')->paginate(10);
        // return view('listsupplier', ['suppliers' => $suppliers]);
        
        return view('listsupplier', [
            'suppliers'=> supplier::latest()->filter()->paginate(10),
        ]);

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
    public function show(listsupplier $listsupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listsupplier $listsupplier)
    {
        
    }

    // public function edit($id){
    //     return 'HI'.$id;
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listsupplier $listsupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
