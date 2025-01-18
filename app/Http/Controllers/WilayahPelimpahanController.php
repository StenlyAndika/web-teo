<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelWilayahPelimpahan;

class WilayahPelimpahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.wilayahpelimpahan.index', [
            'title' => 'Data Wilayah Pelimpahan',
            'instansi' => ModelWilayahPelimpahan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelWilayahPelimpahan::create($validatedData);

        return redirect()->route('admin.wilayahpelimpahan.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelWilayahPelimpahan::where('id_wilayah_pelimpahan', $id)->update($validatedData);

        return redirect()->route('admin.wilayahpelimpahan.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelWilayahPelimpahan::where('id_wilayah_pelimpahan', $id)->delete();
        return redirect()->route('admin.wilayahpelimpahan.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
