@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Data Tahun Pelajaran
</h1>

<div class="bg-white p-5 rounded shadow">

    <a href="{{ route('tahun.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-5 inline-block">
        Tambah Tahun Pelajaran
    </a>

    <table class="w-full border">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Tahun</th>
                <th class="border p-2">Semester</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($tahun as $t)

                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $t->tahun }}
                    </td>

                    <td class="border p-2">
                        {{ $t->semester }}
                    </td>

                    <td class="border p-2">
                        {{ $t->status }}
                    </td>

                    <td class="border p-2 text-center">

                        <a href="{{ route('tahun.edit', $t->id) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        |

                        <form action="{{ route('tahun.destroy', $t->id) }}"
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
                    <td colspan="5" class="text-center p-4">
                        Data tahun pelajaran belum ada
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection