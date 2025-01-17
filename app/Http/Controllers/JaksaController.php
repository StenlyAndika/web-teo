<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelJaksa;

class JaksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jaksa.index', [
            'title' => 'Data Jaksa',
            'kategori' => ModelJaksa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_jaksa' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelJaksa::create($validatedData);

        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_jaksa' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelJaksa::where('id_jaksa', $id)->update($validatedData);

        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelJaksa::where('id_jaksa', $id)->delete();
        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
