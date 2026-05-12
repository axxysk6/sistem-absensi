@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Data Guru
</h1>

<div class="bg-white p-5 rounded shadow">

    <a href="{{ route('guru.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-5 inline-block">
        Tambah Guru
    </a>

    <table class="w-full border">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">NIP</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Telepon</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($guru as $g)

                <tr>
                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $g->nip }}
                    </td>

                    <td class="border p-2">
                        {{ $g->nama }}
                    </td>

                    <td class="border p-2">
                        {{ $g->email }}
                    </td>

                    <td class="border p-2">
                        {{ $g->telepon }}
                    </td>

                    <td class="border p-2 text-center">

                        <a href="{{ route('guru.edit', $g->id) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        |

                        <form action="{{ route('guru.destroy', $g->id) }}"
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
                        Data guru belum tersedia
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection