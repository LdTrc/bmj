<?php

namespace App\Http\Controllers;

use App\Models\reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reminder', [
            'title' => 'reminder'
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
        $validatedData = $request->validate([
            'supplierid'=> 'required',
            'namabarang' => 'required|max:255',
            'quantity' => 'required',
            'warranty' => 'required',
            'order_date' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reminder $reminder)
    {
        //
    }
}
