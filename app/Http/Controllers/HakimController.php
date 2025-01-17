<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelHakim;

class HakimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.hakim.index', [
            'title' => 'Data Hakim',
            'kategori' => ModelHakim::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_hakim' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelHakim::create($validatedData);

        return redirect()->route('admin.hakim.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_hakim' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelHakim::where('id_hakim', $id)->update($validatedData);

        return redirect()->route('admin.hakim.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelHakim::where('id_hakim', $id)->delete();
        return redirect()->route('admin.hakim.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
