@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Kalender Absensi Guru
</h1>

<div class="bg-white p-5 rounded shadow">

    <table class="w-full border">

        <thead class="bg-gray-200">

            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Jam</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Keterangan</th>
            </tr>

        </thead>

        <tbody>

            @forelse($absensi as $a)

                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ $a->jam }}
                    </td>

                    <td class="border p-2 text-center">

                        @if($a->status == 'Masuk')

                            <span class="bg-green-500 text-white px-3 py-1 rounded">
                                Masuk
                            </span>

                        @else

                            <span class="bg-red-500 text-white px-3 py-1 rounded">
                                Pulang
                            </span>

                        @endif

                    </td>

                    <td class="border p-2 text-center">
                        {{ $a->keterangan }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center p-4">
                        Belum ada data absensi
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection