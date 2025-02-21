@extends('components.layout')

@section('title', 'Informasi Tani')

@section('content')
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-14">Informasi Tani</h2>
            <div
                class="flex justify-center mb-14 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">

                <div
                    class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600 bg-[#123524]">
                    <a
                        href="{{ url('https://www.gramedia.com/best-seller/cara-budidaya-padi/?srsltid=AfmBOor5KvCEQQDSEkeeGIbSF_VICDqBuWnH2-C0xhF7vgh9cnjh51VS') }}">
                        <div class="flex items-center mb-6">
                            <img src="{{ asset('img/artikel/padi.jpeg') }}" alt="Teknik Budidaya Padi"
                                class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-[#EFE3C2] font-medium leading-8 mb-9">Teknik Budidaya Padi untuk Hasil Maksimal
                            </h4>
                            <div class="flex items-center justify-between font-medium">
                                <h6 class="text-sm text-[#EFE3C2]">By Tim Agronomi</h6>
                                <span class="text-sm text-[#EFE3C2]">1 bulan lalu</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div
                    class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600 bg-[#123524]">
                    <a
                        href="{{ url('https://pustaka.setjen.pertanian.go.id/info-literasi/pupuk-organik-ramah-lingkungan-kaya-manfaat') }}">
                        <div class="flex items-center mb-6">
                            <img src="{{ asset('img/artikel/pupuk.jpg') }}" alt="Pupuk Organik"
                                class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-[#EFE3C2] font-medium leading-8 mb-9">Manfaat Pupuk Organik bagi Tanaman</h4>
                            <div class="flex items-center justify-between font-medium">
                                <h6 class="text-sm text-[#EFE3C2]">By Ahli Pertanian</h6>
                                <span class="text-sm text-[#EFE3C2]">2 minggu lalu</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div
                    class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600 bg-[#123524]">
                    <a
                        href="{{ url('https://jogjabenih.jogjaprov.go.id/read/2d75624b215ec3db75e64518ef3799d9700552be964ab73bd4585d4308d2676d3278') }}">
                        <div class="flex items-center mb-6">
                            <img src="{{ asset('img/artikel/bawang.jpg') }}" alt="Hama dan Penyakit Tanaman"
                                class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-[#EFE3C2] font-medium leading-8 mb-9">Teknik Budidaya Bawang Merah
                            </h4>
                            <div class="flex items-center justify-between font-medium">
                                <h6 class="text-sm text-[#EFE3C2]">By Pakar Hama</h6>
                                <span class="text-sm text-[#EFE3C2]">3 bulan lalu</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
