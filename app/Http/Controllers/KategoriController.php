<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index', [
            'title' => 'Data Kategori',
            'kategori' => ModelKategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelKategori::create($validatedData);

        return redirect()->route('admin.kategori.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_kategori' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelKategori::where('id_kategori', $id)->update($validatedData);

        return redirect()->route('admin.kategori.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelKategori::where('id_kategori', $id)->delete();
        return redirect()->route('admin.kategori.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
