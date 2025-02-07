@extends('components.layout')

@section('title', 'Beri Saran')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Berikan Saran</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citizen.beri-saran.submit') }}" method="POST">
            @csrf
            <div id="form_beri-saran">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Berikan Saran</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Saran Anda</label>
                        <textarea name="isi_saran" id="isi_saran" rows="4"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[#EFE3C2]"
                            placeholder="Masukkan saran Anda di sini..." required>{{ old('isi_saran') }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-gray-600 mt-4">
                    Kirim Saran
                </button>
            </div>
        </form>
    </div>
@endsection
