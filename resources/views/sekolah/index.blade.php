@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Data Sekolah
</h1>

<div class="bg-white p-5 rounded shadow">

    <a href="{{ route('sekolah.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded mb-5 inline-block">
        Tambah Data Sekolah
    </a>

    <table class="w-full border">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Sekolah</th>
                <th class="border p-2">NPSN</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2">Kepala Sekolah</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($sekolah as $s)

                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $s->nama_sekolah }}
                    </td>

                    <td class="border p-2">
                        {{ $s->npsn }}
                    </td>

                    <td class="border p-2">
                        {{ $s->alamat }}
                    </td>

                    <td class="border p-2">
                        {{ $s->kepala_sekolah }}
                    </td>

                    <td class="border p-2 text-center">

                        <a href="{{ route('sekolah.edit', $s->id) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        |

                        <form action="{{ route('sekolah.destroy', $s->id) }}"
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
                    <td colspan="6" class="text-center p-4">
                        Data sekolah belum ada
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection