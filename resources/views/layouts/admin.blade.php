<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 h-screen bg-blue-900 text-white p-5">

        <h1 class="text-2xl font-bold mb-10">
            ABSENSI SMKN 45 JAKARTA
        </h1>

        <ul class="space-y-6">

           @if(auth()->user()->role == 'admin')

<li>
    <a href="/dashboard" class="block hover:text-yellow-300 font-semibold">
        Dashboard
    </a>
</li>

@endif

            @if(auth()->check() && auth()->user()->role == 'admin')

                <li>
                    <h2 class="font-bold text-yellow-300 mb-2">PENGGUNA</h2>
                    <ul class="ml-3 space-y-2">
                        <li><a href="{{ route('guru.index') }}" class="hover:text-yellow-300">Data Guru</a></li>
                        <li><a href="{{ route('kepala.index') }}" class="hover:text-yellow-300">Data Kepala Sekolah</a></li>
                    </ul>
                </li>

                <li>
                    <h2 class="font-bold text-yellow-300 mb-2">ADMINISTRASI</h2>
                    <ul class="ml-3 space-y-2">
                        <li><a href="{{ route('sekolah.index') }}" class="hover:text-yellow-300">Data Sekolah</a></li>
                        <li><a href="{{ route('tahun.index') }}" class="hover:text-yellow-300">Data Tahun Pelajaran</a></li>
                        <li><a href="{{ route('libur.index') }}" class="hover:text-yellow-300">Data Hari Libur</a></li>
                    </ul>
                </li>

                <li>
                    <h2 class="font-bold text-yellow-300 mb-2">ABSENSI</h2>
                    <ul class="ml-3 space-y-2">
                        <li><a href="{{ route('absensi.index') }}" class="hover:text-yellow-300">Data Absensi</a></li>
                        <li><a href="{{ route('absensi.rekap') }}" class="hover:text-yellow-300">Rekapitulasi Absensi</a></li>
                    </ul>
                </li>

            @endif


            @if(auth()->check() && auth()->user()->role == 'guru')

                <li>
                    <h2 class="font-bold text-yellow-300 mb-2">MENU GURU</h2>
                    <ul class="ml-3 space-y-2">
                        <li><a href="{{ route('guru.dashboard') }}" class="hover:text-yellow-300">Dashboard Guru</a></li>
                        <li><a href="{{ route('absensi.index') }}" class="hover:text-yellow-300">Absen Saya</a></li>
                        <li><a href="{{ route('absensi.rekap') }}" class="hover:text-yellow-300">Rekap Saya</a></li>
                        <li><a href="{{ route('absensi.kalender') }}" class="hover:text-yellow-300">Kalender Absensi</a></li>
                    </ul>
                </li>

            @endif

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1">

        <!-- TOP BAR PROFIL (FIXED & STABLE) -->
        <div class="flex justify-end bg-white shadow px-6 py-3">

            <div class="relative">

                <!-- BUTTON -->
                <button onclick="toggleDropdown()"
                        class="bg-gray-800 text-white px-4 py-2 rounded">
                    <div class="flex items-center bg-gray-800 text-white px-4 py-2 rounded">

    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
         class="w-8 h-8 rounded-full mr-2">

    <span>{{ Auth::user()->name }}</span>

</div>
                </button>

                <!-- DROPDOWN -->
                <div id="dropdown"
                     class="hidden absolute right-0 mt-2 w-40 bg-white shadow-lg rounded">

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Profil Saya
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-10">

            @if(session('success'))
                <div id="alert-success"
                     class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

            <script>
            function toggleProfileMenu() {
                document.getElementById('profileMenu').classList.toggle('hidden');
            }
            </script>

        </div>

    </div>

</div>

<script>
function toggleDropdown() {
    let menu = document.getElementById('dropdown');
    menu.classList.toggle('hidden');
}

// auto hide alert
setTimeout(() => {
    let alert = document.getElementById('alert-success');
    if (alert) {
        alert.style.display = "none";
    }
}, 2000);
</script>
 
</body>
</html>