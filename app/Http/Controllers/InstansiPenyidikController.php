<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelInstansiPenyidik;

class InstansiPenyidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.instansipenyidik.index', [
            'title' => 'Data Instansi Penyidik',
            'instansi' => ModelInstansiPenyidik::all()
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

        ModelInstansiPenyidik::create($validatedData);

        return redirect()->route('admin.instansipenyidik.index')->with('toast_success', 'Data berhasil ditambah!');
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

        ModelInstansiPenyidik::where('id_instansi_penyidik', $id)->update($validatedData);

        return redirect()->route('admin.instansipenyidik.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelInstansiPenyidik::where('id_instansi_penyidik', $id)->delete();
        return redirect()->route('admin.instansipenyidik.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
