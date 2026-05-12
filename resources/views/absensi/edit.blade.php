@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Edit Absensi
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('absensi.update', $absensi->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label>Guru</label>

            <select name="guru_id"
                    class="w-full border px-3 py-2">

                @foreach ($guru as $g)

                    <option value="{{ $g->id }}"
                        {{ $absensi->guru_id == $g->id ? 'selected' : '' }}>

                        {{ $g->nama }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label>Tanggal</label>

            <input type="date"
                   name="tanggal"
                   value="{{ $absensi->tanggal }}"
                   class="w-full border px-3 py-2">

        </div>

        <div class="mb-4">

            <label>Status</label>

            <select name="status" class="border p-2 w-full">

                <option value="Masuk" {{ $absensi->status == 'Masuk' ? 'selected' : '' }}>
                    Masuk
                </option>

                <option value="Pulang" {{ $absensi->status == 'Pulang' ? 'selected' : '' }}>
                    Pulang
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label>Keterangan</label>

            <textarea name="keterangan"
                      class="w-full border px-3 py-2">{{ $absensi->keterangan }}</textarea>

        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection