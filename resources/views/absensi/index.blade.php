@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Data Absensi
</h1>

<div class="bg-white p-5 rounded shadow">

    @if(auth()->user()->role == 'admin')
        <a href="{{ route('absensi.create') }}"
           class="bg-blue-500 text-white px-3 py-2 rounded">
            Tambah Absen
        </a>
    @endif

    <table class="w-full border mt-4">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Guru</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
                <th class="border p-2">Foto</th>
            </tr>
        </thead>

        <tbody>

        @forelse ($absensi as $a)

            <tr>
                <td class="border p-2 text-center">
                    {{ $loop->iteration }}
                </td>
                

                <td class="border p-2">
                    {{ $a->guru->nama ?? '-' }}
                </td>

                <td class="border p-2">
                    {{ $a->tanggal }}
                </td>

                <td class="border p-2">
                    {{ $a->status }}
                </td>

                <td class="border p-2">
                    {{ $a->keterangan }}
                </td>

                <td class="border p-2 text-center">

                    @if(auth()->user()->role == 'admin')

                        <a href="{{ route('absensi.edit', $a->id) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        |

                        <form action="{{ route('absensi.destroy', $a->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600"
                                    onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>

                        </form>

                    @endif

                    <td class="border p-2 text-center">
    @if($a->foto)
        <img src="{{ asset('storage/absensi/' . $a->foto) }}"
             class="w-16 h-16 object-cover rounded mx-auto">
    @else
        <span class="text-gray-400">Tidak ada foto</span>
    @endif
</td>
                </td>
            </tr>


        @empty

            <tr>
                <td colspan="6" class="text-center p-4">
                    Data absensi belum ada
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection