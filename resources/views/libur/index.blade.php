@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Data Hari Libur
</h1>

<div class="bg-white p-5 rounded shadow">

    <a href="{{ route('libur.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-5 inline-block">
        Tambah Hari Libur
    </a>

    <table class="w-full border">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Libur</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($libur as $l)
            

                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $l->nama_libur }}
                    </td>

                    <td class="border p-2">
                        {{ $l->tanggal }}
                    </td>

                    <td class="border p-2">
                        {{ $l->keterangan }}
                    </td>

                    <td class="border p-2 text-center">

    <a href="{{ route('libur.edit', $l->id) }}"
       class="text-blue-600">
        Edit
    </a>

    |

    <form action="{{ route('libur.destroy', $l->id) }}"
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

</td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center p-4">
                        Data hari libur belum ada
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection