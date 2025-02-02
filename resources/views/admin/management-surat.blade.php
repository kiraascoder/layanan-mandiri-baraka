@extends('components.layout')

@section('title', 'Management Surat')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold">Management Surat</h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $surat->citizen->nik }}</td>
                            <td class="px-6 py-4">{{ $surat->citizen->name }} </td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $surat->jenis_surat) }}</td>
                            <td class="px-6 py-4 capitalize">{{ $surat->status ?? '-' }}</td>
                            <td class="px-6 py-4 "><a href="{{ route('admin.detail-surat', $surat->id) }}"
                                    class="text-blue-500 hover:underline">Lihat Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
