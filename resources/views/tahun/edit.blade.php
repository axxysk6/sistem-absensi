@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Edit Tahun Pelajaran
</h1>

<div class="bg-white p-5 rounded shadow">

    <form action="{{ route('tahun.update', $tahun->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Tahun Pelajaran</label>

            <input type="text"
                   name="tahun"
                   value="{{ $tahun->tahun }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Semester</label>

            <select name="semester"
                    class="w-full border px-3 py-2">

                <option value="Ganjil"
                    {{ $tahun->semester == 'Ganjil' ? 'selected' : '' }}>
                    Ganjil
                </option>

                <option value="Genap"
                    {{ $tahun->semester == 'Genap' ? 'selected' : '' }}>
                    Genap
                </option>

            </select>
        </div>

        <div class="mb-4">
            <label>Status</label>

            <select name="status"
                    class="w-full border px-3 py-2">

                <option value="Aktif"
                    {{ $tahun->status == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="Nonaktif"
                    {{ $tahun->status == 'Nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection