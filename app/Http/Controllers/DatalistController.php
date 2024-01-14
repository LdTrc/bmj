<?php

namespace App\Http\Controllers;

use App\Models\datalist;
use Illuminate\Http\Request;

class DatalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('list', [
            'title' => 'list'
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
    public function show(datalist $datalist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datalist $datalist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datalist $datalist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datalist $datalist)
    {
        //
    }
}
