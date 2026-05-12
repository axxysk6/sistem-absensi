@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Tahun Pelajaran
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('tahun.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label>Tahun Pelajaran</label>

            <input type="text"
                   name="tahun"
                   class="w-full border px-3 py-2"
                   placeholder="2025/2026">
        </div>

        <div class="mb-4">
            <label>Semester</label>

            <select name="semester"
                    class="w-full border px-3 py-2">

                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>

            </select>
        </div>

        <div class="mb-4">
            <label>Status</label>

            <select name="status"
                    class="w-full border px-3 py-2">

                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>

            </select>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection