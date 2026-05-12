@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Edit Kepala Sekolah
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('kepala.update', $kepala->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>NIP</label>
            <input type="text" name="nip"
                   value="{{ $kepala->nip }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama"
                   value="{{ $kepala->nama }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email"
                   value="{{ $kepala->email }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Telepon</label>
            <input type="text" name="telepon"
                   value="{{ $kepala->telepon }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="alamat"
                      class="w-full border px-3 py-2">{{ $kepala->alamat }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection