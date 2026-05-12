<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunPelajaran;

class TahunPelajaranController extends Controller
{
    public function index()
    {
        $tahun = TahunPelajaran::all();

        return view('tahun.index', compact('tahun'));
    }

    public function create()
    {
        return view('tahun.create');
    }

    public function store(Request $request)
    {
        TahunPelajaran::create([
            'tahun' => $request->tahun,
            'semester' => $request->semester,
            'status' => $request->status,
        ]);

        return redirect()->route('tahun.index');
    }
    public function edit($id)
    {
        $tahun = TahunPelajaran::findOrFail($id);

        return view('tahun.edit', compact('tahun'));
    }

    public function update(Request $request, $id)
    {
        $tahun = TahunPelajaran::findOrFail($id);

        $tahun->update([
            'tahun' => $request->tahun,
            'semester' => $request->semester,
            'status' => $request->status,
        ]);

        return redirect()->route('tahun.index');
    }

    public function destroy($id)
    {
        $tahun = TahunPelajaran::findOrFail($id);

        $tahun->delete();

        return redirect()->route('tahun.index');
    }
}