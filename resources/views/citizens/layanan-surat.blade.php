@extends('components.layout')

@section('title', 'Layanan Surat')

@section('content')
    <div class="mt-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="caption">
            <h1 class="text-3xl font-bold">Layanan Surat</h1>
            <p class="mt-2">Buat Surat</p>
        </div>
        <div class="mt-4 mb-4">
            <a href="{{ route('citizen.buat-surat') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                Buat Surat
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jenis Surat</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $surat->citizen->nik }}</td>
                            <td class="px-6 py-4">{{ $surat->citizen->name }}</td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $surat->jenis_surat) }}</td>
                            <td class="px-6 py-4 capitalize">{{ $surat->status ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
