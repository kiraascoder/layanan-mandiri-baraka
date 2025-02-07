@extends('components.layout')

@section('title', 'Beri Saran')

@section('content')
    <div class="mt-4">
        <div class="caption">
            @if (session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-3xl font-bold">Beri Saran</h1>
            <p class="mt-2">
                Beri Saran
            </p>
        </div>
        <div class="mt-4 mb-4">
            <a href="{{ route('citizen.beri-saran.form') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#3E7B27] hover:bg-gray-600 rounded-lg">
                Berikan Saran
            </a>
        </div>
    </div>
@endsection
