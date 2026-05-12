@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-5">Profil Saya</h1>

@if(session('success'))
    <div class="bg-green-500 text-white p-2 mb-3">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white p-5 rounded shadow">

    <!-- AVATAR -->
    <div class="mb-4">
        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
             width="120"
             class="rounded-full">
    </div>

    <!-- FORM UPLOAD -->
    <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
        @csrf

        <input type="file" name="avatar" class="mb-3">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Upload Foto
        </button>

    </form>

</div>

@endsection