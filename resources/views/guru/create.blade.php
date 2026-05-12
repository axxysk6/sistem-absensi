@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Guru
</h1>

<div class="bg-white p-5 rounded shadow">

@if ($errors->any())

    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

    <form action="{{ route('guru.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                NIP
            </label>

            <input type="text"
                    name="nip"
                    class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Nama Guru
            </label>

            <input type="text"
                   name="nama"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Email
            </label>

            <input type="email"
                   name="email"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Telepon
            </label>

            <input type="text"
                   name="telepon"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Alamat
            </label>

            <textarea
                name="alamat"
                class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection