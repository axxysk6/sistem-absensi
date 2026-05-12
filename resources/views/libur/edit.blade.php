@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Edit Hari Libur
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('libur.update', $libur->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama Libur</label>

            <input type="text"
                   name="nama_libur"
                   value="{{ $libur->nama_libur }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Tanggal</label>

            <input type="date"
                   name="tanggal"
                   value="{{ $libur->tanggal }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Keterangan</label>

            <textarea name="keterangan"
                      class="w-full border px-3 py-2">{{ $libur->keterangan }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection