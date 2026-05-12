@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">

    <div>
        <h1 class="text-4xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-2">
            Selamat datang di Sistem Absensi Guru SMKN 45 Jakarta
        </p>
    </div>

    <!-- JAM -->
    <div class="bg-white shadow-xl rounded-2xl px-6 py-4 mt-5 md:mt-0">

        <p class="text-gray-500 text-sm">
            Waktu Sekarang
        </p>

        <h2 id="jamRealtime"
            class="text-3xl font-bold text-blue-700">
            00:00:00
        </h2>

    </div>

</div>


<!-- CARD -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    <!-- TOTAL GURU -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-xl hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center">

            <div>
                <p class="text-sm uppercase opacity-80">
                    Total Guru
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ $totalGuru }}
                </h2>
            </div>

            <div class="text-6xl opacity-80">
                👨‍🏫
            </div>

        </div>

    </div>


    <!-- TOTAL ABSENSI -->
    <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-2xl shadow-xl hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center">

            <div>
                <p class="text-sm uppercase opacity-80">
                    Total Absensi
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ \App\Models\Absensi::count() }}
                </h2>
            </div>

            <div class="text-6xl opacity-80">
                📋
            </div>

        </div>

    </div>


    <!-- TOTAL USER -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white p-6 rounded-2xl shadow-xl hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center">

            <div>
                <p class="text-sm uppercase opacity-80">
                    Total User
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ \App\Models\User::count() }}
                </h2>
            </div>

            <div class="text-6xl opacity-80">
                👥
            </div>

        </div>

    </div>

</div>


<!-- INFORMASI -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- INFO ADMIN -->
    <div class="bg-white rounded-2xl shadow-xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Informasi Admin
        </h2>

        <div class="space-y-5">

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Nama</span>

                <span class="font-bold">
                    {{ Auth::user()->name }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Role</span>

                <span class="font-bold">
                    {{ Auth::user()->role }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Tahun</span>

                <span class="font-bold">
                    {{ date('Y') }}
                </span>
            </div>

        </div>

    </div>


    <!-- INFO SISTEM -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-700 text-white rounded-2xl shadow-xl p-8">

        <h2 class="text-3xl font-bold mb-4">
            Sistem Absensi Guru
        </h2>

        <p class="text-lg leading-relaxed opacity-90">
            Sistem ini digunakan untuk membantu proses absensi guru secara realtime berbasis web menggunakan Laravel.
        </p>

        <div class="mt-6">

            <div class="bg-white/20 rounded-xl p-4">

                <p class="text-sm opacity-80">
                    Status Sistem
                </p>

                <h3 class="text-2xl font-bold mt-1">
                    Online ✅
                </h3>

            </div>

        </div>

    </div>

</div>


<script>

// JAM REALTIME
function updateJam() {

    const now = new Date();

    const jam = now.toLocaleTimeString('id-ID');

    document.getElementById('jamRealtime').innerHTML = jam;
}

setInterval(updateJam, 1000);

updateJam();

</script>

@endsection