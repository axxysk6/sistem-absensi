<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Guru;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'guru') {

            $absensi = Absensi::where('guru_id', $user->guru_id)
                ->orderBy('tanggal', 'desc')
                ->get();

        } else {

            $absensi = Absensi::with('guru')
                ->orderBy('tanggal', 'desc')
                ->get();
        }

        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $guru = Guru::all();

        return view('absensi.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        Absensi::create([
            'guru_id' => $request->guru_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $guru = Guru::all();

        return view('absensi.edit', compact('absensi', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->update([
            'guru_id' => $request->guru_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()->route('absensi.index');
    }

    public function rekap(Request $request)
    {
        $tanggal = $request->tanggal;

        $guru = Guru::all();

        return view('absensi.rekap', compact('guru', 'tanggal'));
    }

    public function pdf(Request $request)
    {
        $tanggal = $request->tanggal;

        $rekap = Guru::whereHas('absensi', function ($query) use ($tanggal) {

            if ($tanggal) {
                $query->whereDate('tanggal', $tanggal);
            }

        })->get();

        $pdf = Pdf::loadView('absensi.pdf', compact('rekap', 'tanggal'));

        return $pdf->download('rekap-absensi.pdf');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $today = now()->toDateString();

        $sudahMasuk = Absensi::where('guru_id', auth()->user()->guru_id)
            ->whereDate('tanggal', $today)
            ->where('status', 'Masuk')
            ->first();

        if ($sudahMasuk) {
            return back()->with('error', 'Anda sudah absen masuk hari ini');
        }

        $file = $request->file('foto');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('absensi', $fileName, 'public');

        Absensi::create([
            'guru_id' => auth()->user()->guru_id,
            'tanggal' => $today,
            'status' => 'Masuk',
            'jam' => now()->format('H:i:s'),
            'foto' => $fileName,
            'keterangan' => 'Absen Masuk',
        ]);

        return back()->with('success', 'Berhasil absen masuk');
    }

    public function pulang()
    {
        $today = now()->toDateString();

        $cek = Absensi::where('guru_id', auth()->user()->guru_id)
            ->whereDate('tanggal', $today)
            ->where('status', 'Masuk')
            ->first();

        if (!$cek) {
            return back()->with('error', 'Belum absen masuk');
        }

        $sudah = Absensi::where('guru_id', auth()->user()->guru_id)
            ->whereDate('tanggal', $today)
            ->where('status', 'Pulang')
            ->first();

        if ($sudah) {
            return back()->with('error', 'Sudah absen pulang');
        }

        Absensi::create([
            'guru_id' => auth()->user()->guru_id,
            'tanggal' => $today,
            'status' => 'Pulang',
            'jam' => now()->format('H:i:s'),
            'foto' => null,
            'keterangan' => 'Absen Pulang',
        ]);

        return back()->with('success', 'Berhasil absen pulang');
    }

    public function kalender()
    {
        $absensi = Absensi::where('guru_id', auth()->user()->guru_id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('absensi.kalender', compact('absensi'));
    }
}