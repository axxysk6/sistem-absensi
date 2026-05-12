@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-8 flex items-center justify-between flex-wrap gap-4">

    <div>
        <h1 class="text-4xl font-bold text-gray-800">
            Dashboard Guru
        </h1>

        <p class="text-gray-500 mt-2">
            Selamat datang kembali 👋
        </p>
    </div>


    <!-- JAM REALTIME -->
    <div class="bg-white shadow-lg rounded-2xl px-6 py-4 text-center">

        <p class="text-gray-500 text-sm mb-1">
            Waktu Sekarang
        </p>

        <h2 id="jamRealtime"
            class="text-3xl font-bold text-blue-700">
            00:00:00
        </h2>

    </div>

</div>


<!-- ALERT -->


@if(session('error'))
    <div class="bg-red-500 text-white px-4 py-3 rounded-xl mb-5 shadow-lg">
        {{ session('error') }}
    </div>
@endif


<!-- CARD INFO -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- NAMA -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-8 border-blue-600 hover:scale-105 transition duration-300">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">
                    Nama Guru
                </p>

                <h2 class="text-2xl font-bold text-gray-800 mt-2">
                    {{ Auth::user()->name }}
                </h2>
            </div>

            <div class="text-5xl">
                👨‍🏫
            </div>

        </div>

    </div>


    <!-- STATUS ABSEN -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-8 border-green-600 hover:scale-105 transition duration-300">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">
                    Status Hari Ini
                </p>

                <h2 class="text-2xl font-bold text-gray-800 mt-2">
                    @if($absenMasuk && $absenPulang)
                        Sudah Pulang
                    @elseif($absenMasuk)
                        Sudah Masuk
                    @else
                        Belum Absen
                    @endif
                </h2>
            </div>

            <div class="text-5xl">
                ✅
            </div>

        </div>

    </div>
    <!-- TANGGAL -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-8 border-purple-600 hover:scale-105 transition duration-300">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">
                    Tanggal Hari Ini
                </p>

                <h2 class="text-2xl font-bold text-gray-800 mt-2">
                    {{ now()->translatedFormat('d F Y') }}
                </h2>
            </div>

            <div class="text-5xl">
                📅
            </div>

        </div>

    </div>
</div>


<!-- FORM ABSEN -->
<div class="bg-white shadow-xl rounded-2xl p-8 mb-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Absen Masuk
    </h2>


    <form method="POST"
          action="{{ route('absensi.masuk') }}"
          enctype="multipart/form-data"
          onsubmit="return checkFoto()">

        @csrf

        <div class="mb-5">

            <label class="block font-semibold mb-2 text-gray-700">
                Upload Foto Bukti Absen
            </label>

            <input type="file"
                   name="foto"
                   id="fotoInput"
                   accept="image/*"
                   class="border-2 border-gray-300 rounded-xl p-3 w-full"
                   onchange="previewFoto(event)">

        </div>
<!-- PREVIEW FOTO -->
        <div class="mb-5">

            <img id="preview"
                 class="rounded-2xl shadow-lg hidden"
                 width="250">

        </div>


        <!-- BUTTON -->
        <div class="flex flex-wrap gap-4">

            <button class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg">
                📸 Absen Masuk
            </button>

    </form>


            <form method="POST"
                  action="{{ route('absensi.pulang') }}">

                @csrf

                <button class="bg-red-600 hover:bg-red-700 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg">
                    🚪 Absen Pulang
                </button>

            </form>

        </div>

</div>
<!-- INFORMASI -->
        Informasi Sistem
    </h2>

    <p class="text-lg leading-relaxed opacity-90">
        Sistem absensi guru berbasis web untuk mempermudah pencatatan kehadiran guru secara realtime.
    </p>

</div>


<script>

// PREVIEW FOTO
function previewFoto(event) {

    let file = event.target.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function(e) {

        let preview = document.getElementById('preview');

        preview.src = e.target.result;

        preview.classList.remove('hidden');
    }

    reader.readAsDataURL(file);
}


// VALIDASI FOTO
function checkFoto() {

    let foto = document.getElementById('fotoInput').files.length;

    if (foto === 0) {

        alert('Silakan upload foto terlebih dahulu!');

        return false;
    }

    return true;
}


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