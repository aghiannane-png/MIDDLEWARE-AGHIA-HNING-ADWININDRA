<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900 space-y-3">
                <p>Login sebagai: <b>{{ auth()->user()->name }}</b> (role: <b>{{ auth()->user()->role }}</b>)</p>

                <ul class="list-disc pl-6 text-blue-600 underline">
                    <li><a href="{{ route('mahasiswa.data') }}">Data Mahasiswa</a></li>
                    <li><a href="{{ route('dosen.perwalian') }}">Menu Dosen Wali</a></li>
                    <li><a href="{{ route('kaprodi.laporan') }}">Menu Kaprodi</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>