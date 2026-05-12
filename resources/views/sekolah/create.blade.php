@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Data Sekolah
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('sekolah.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label>Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>NPSN</label>
            <input type="text" name="npsn" class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Alamat</label>
            <input type="text" name="alamat" class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Kepala Sekolah</label>
            <input type="text" name="kepala_sekolah" class="w-full border px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection