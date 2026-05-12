<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- AVATAR UPLOAD -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <h2 class="text-lg font-bold mb-4">Foto Profil</h2>

                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                         class="w-24 h-24 rounded-full mb-4">

                    <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="avatar" class="mb-3">

                        <button class="bg-blue-600 text-white px-4 py-2 rounded">
                            Upload Avatar
                        </button>

                    </form>

                </div>
            </div>

            <!-- UPDATE PROFILE INFO (BAWAAN BREEZE) -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>