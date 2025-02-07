@extends('components.layout')

@section('title', 'Daftar Penduduk')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold mt-4">Daftar Penduduk</h1>
            <p>Informasi Penduduk</p>
        </div>
        <div class="mt-4 mb-4">
            <a href="{{ route('admin.daftar-penduduk.tambah-penduduk') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#3E7B27] hover:bg-gray-600 rounded-lg">
                Tambah Penduduk
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#123524] dark:bg-[#123524] dark:text-gray-400 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TTL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pekerjaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citizens as $citizen)
                        <tr
                            class="bg-white border-b dark:bg-[#123524] dark:border-[#EFE3C2] hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $citizen->nik }}
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $citizen->name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $citizen->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $citizen->pekerjaan }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.daftar-penduduk.destroy', $citizen->nik) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                                </form>
                                |
                                <a href="{{ route('admin.daftar-penduduk.edit-penduduk', $citizen->nik) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script></script>
@endsection
