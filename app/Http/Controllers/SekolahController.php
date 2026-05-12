<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('sekolah.index', compact('sekolah'));
    }
    public function create()
    {
        return view('sekolah.create');
    }
    public function store(Request $request)
    {
        Sekolah::create([
                'nama_sekolah' => $request->nama_sekolah,
                'npsn' => $request->npsn,
                'alamat' => $request->alamat,
                'kepala_sekolah' => $request->kepala_sekolah,
            ]);

    return redirect()->route('sekolah.index');
    }
    public function edit($id)
{
    $sekolah = Sekolah::findOrFail($id);

    return view('sekolah.edit', compact('sekolah'));
}

public function update(Request $request, $id)
{
    $sekolah = Sekolah::findOrFail($id);

    $sekolah->update([
        'nama_sekolah' => $request->nama_sekolah,
        'npsn' => $request->npsn,
        'alamat' => $request->alamat,
        'kepala_sekolah' => $request->kepala_sekolah,
    ]);

    return redirect()->route('sekolah.index');
}

public function destroy($id)
{
    $sekolah = Sekolah::findOrFail($id);

    $sekolah->delete();

    return redirect()->route('sekolah.index');
}
}
