<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelInstansiPelaksana;

class InstansiPelaksanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.instansipelaksana.index', [
            'title' => 'Data Instansi Pelaksana',
            'instansi' => ModelInstansiPelaksana::all()
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

        ModelInstansiPelaksana::create($validatedData);

        return redirect()->route('admin.instansipelaksana.index')->with('toast_success', 'Data berhasil ditambah!');
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

        ModelInstansiPelaksana::where('id_instansi_pelaksana', $id)->update($validatedData);

        return redirect()->route('admin.instansipelaksana.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelInstansiPelaksana::where('id_instansi_pelaksana', $id)->delete();
        return redirect()->route('admin.instansipelaksana.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
