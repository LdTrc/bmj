<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class ListsupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        return view('listsupplier', [
            "supplier" => supplier::all()
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
