@extends('components.layout')

@section('title', 'Detail Kelurahan')

@section('content')

    <div class="mt-4">
        <div class="caption mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Detail Kelurahan</h1>
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="text-lg text-gray-500">Informasi lengkap mengenai jumlah surat dan warga kelurahan</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-600"><strong>Nama Kelurahan:</strong> {{ $kelurahan->nama }}</p>
                    <p class="text-sm text-gray-600"><strong>Jumlah Warga:</strong> {{ $kelurahan->citizens_count }}</p>
                    <p class="text-sm text-gray-600"><strong>Jumlah Surat Keluar:</strong> {{ $kelurahan->surats_count }}</p>
                </div>
            </div>
        </div>
    </div>


@endsection
