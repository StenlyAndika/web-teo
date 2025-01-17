<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPengacara;

class PengacaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pengacara.index', [
            'title' => 'Data Pengacara',
            'kategori' => ModelPengacara::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_pengacara' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelPengacara::create($validatedData);

        return redirect()->route('admin.pengacara.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_pengacara' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelPengacara::where('id_pengacara', $id)->update($validatedData);

        return redirect()->route('admin.pengacara.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelPengacara::where('id_pengacara', $id)->delete();
        return redirect()->route('admin.pengacara.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
