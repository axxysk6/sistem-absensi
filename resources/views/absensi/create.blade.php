@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Absensi
</h1>

<div class="bg-white p-5 rounded shadow">
    
@if ($errors->any())
    <div class="bg-red-500 text-white p-3 mb-4 rounded">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
    <form action="{{ route('absensi.store') }}"
          method="POST">

        @csrf

        <div class="mb-4">

            <label>Guru</label>

            <select name="guru_id"
                    class="w-full border px-3 py-2">

                <option value="">
                    -- Pilih Guru --
                </option>

                @foreach ($guru as $g)

                    <option value="{{ $g->id }}">
                        {{ $g->nama }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label>Tanggal</label>

            <input type="date"
                   name="tanggal"
                   class="w-full border px-3 py-2">

        </div>

        <div class="mb-4">

            <label>Status</label>

            <select name="status" class="border px-3 py-2 w-full">

                <option value="Masuk">Masuk</option>
                <option value="Pulang">Pulang</option>

            </select>

        </div>

        <div class="mb-4">

            <label>Keterangan</label>

            <textarea name="keterangan"
                      class="w-full border px-3 py-2"></textarea>

        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection