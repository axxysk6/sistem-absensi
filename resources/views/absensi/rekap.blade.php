@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Rekap Absensi Guru
</h1>
<form method="GET"
      action="{{ route('absensi.rekap') }}"
      class="mb-5">

    <input type="date"
           name="tanggal"
           value="{{ $tanggal ?? '' }}"
           class="border px-3 py-2">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Filter
    </button>

</form>

<a href="{{ route('absensi.pdf', ['tanggal' => $tanggal]) }}"
   class="bg-red-600 text-white px-4 py-2 rounded inline-block mb-5">

    Cetak PDF

</a>

<div class="bg-white p-5 rounded shadow">

    <table class="w-full border">

        <thead class="bg-gray-200">

        <tr>
            <th class="border p-2">No</th>
            <th class="border p-2">Nama Guru</th>
            <th class="border p-2">Masuk</th>
            <th class="border p-2">Pulang</th>
        </tr>

        </thead>

        <tbody>

            @foreach ($guru as $g)

            <tr>

                <td class="border p-2 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $g->nama }}
                </td>

                <td class="border p-2 text-center">
                    {{ $g->absensi()
                        ->where('status', 'Masuk')
                        ->when($tanggal, function ($query) use ($tanggal) {
                            $query->whereDate('tanggal', $tanggal);
                        })
                        ->count() }}
                </td>

                <td class="border p-2 text-center">
                    {{ $g->absensi()
                        ->where('status', 'Pulang')
                        ->when($tanggal, function ($query) use ($tanggal) {
                            $query->whereDate('tanggal', $tanggal);
                        })
                        ->count() }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection