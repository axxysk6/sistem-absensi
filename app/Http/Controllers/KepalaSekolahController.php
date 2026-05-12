<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KepalaSekolah;

class KepalaSekolahController extends Controller
{
    public function index()
    {
        $kepala = KepalaSekolah::all();
        return view('kepala.index', compact('kepala'));
    }

    public function create()
    {
        return view('kepala.create');
    }

    public function store(Request $request)
    {
        KepalaSekolah::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect('/kepala');
    }

    public function edit($id)
    {
        $kepala = KepalaSekolah::findOrFail($id);
        return view('kepala.edit', compact('kepala'));
    }

    public function update(Request $request, $id)
    {
        $kepala = KepalaSekolah::findOrFail($id);

        $kepala->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect('/kepala');
    }

    public function destroy($id)
    {
        $kepala = KepalaSekolah::findOrFail($id);
        $kepala->delete();

        return redirect('/kepala');
    }
}