<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HariLibur;

class HariLiburController extends Controller
{
    public function index()
    {
        $libur = HariLibur::all();

        return view('libur.index', compact('libur'));
    }

    public function create()
    {
        return view('libur.create');
    }

    public function store(Request $request)
    {
        HariLibur::create([
            'nama_libur' => $request->nama_libur,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('libur.index');
    }
    public function edit($id)
    {
        $libur = HariLibur::findOrFail($id);

        return view('libur.edit', compact('libur'));
    }

    public function update(Request $request, $id)
    {
        $libur = HariLibur::findOrFail($id);

        $libur->update([
            'nama_libur' => $request->nama_libur,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('libur.index');
    }

    public function destroy($id)
    {
        $libur = HariLibur::findOrFail($id);

        $libur->delete();

        return redirect()->route('libur.index');
    }
}