<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register', [
            'title' => 'register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:30',
            'email'=>'email:dns|unique:users',
            'password'=>'required|min:5|max:255'
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('sukses', 'Registrasi Berhasil, Silahkan Login !');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
