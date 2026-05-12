<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count();

        $hadir = Absensi::where('status', 'Hadir')->count();
        $izin = Absensi::where('status', 'Izin')->count();
        $sakit = Absensi::where('status', 'Sakit')->count();
        $alpha = Absensi::where('status', 'Alpha')->count();

        return view('dashboard', compact(
            'totalGuru',
            'hadir',
            'izin',
            'sakit',
            'alpha'
        ));
    }

    public function guru()
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    $today = now()->toDateString();

    $absenMasuk = Absensi::where('guru_id', auth()->user()->guru_id)
        ->where('tanggal', $today)
        ->where('status', 'Masuk')
        ->first();

    $absenPulang = Absensi::where('guru_id', auth()->user()->guru_id)
        ->where('tanggal', $today)
        ->where('status', 'Pulang')
        ->first();

    return view('guru.dashboard', compact('absenMasuk', 'absenPulang'));
}
}