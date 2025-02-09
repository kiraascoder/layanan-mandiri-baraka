<header class="bg-[#123524] sticky top-0 z-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto font-scope-one">
        <!-- Logo dan Judul -->
        <div class="flex items-center gap-4">
            <!-- Logo -->
            <div class="w-20 p-4">
                <a href="/">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Website Logo" class="w-32">
                </a>
            </div>
            <!-- Teks Judul -->
            <div class="text-white text-xl font-semibold">
                Layanan Mandiri
                <p>Kecamatan Baraka</p>
            </div>
        </div>

        @if (Auth::check())
            @if (Auth::user()->role == 'kelurahan')
                <!-- Navbar untuk Admin Kelurahan -->
                <div
                    class="nav-links duration-500 md:static absolute bg-[#123524] md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                    <ul
                        class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-penduduk') }}">Daftar Penduduk</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.management-surat') }}">Management Surat</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.masukan') }}">Masukan</a></li>
                    </ul>
                </div>
            @elseif (Auth::user()->role == 'superadmin')
                <!-- Navbar untuk Superadmin -->
                <div
                    class="nav-links duration-500 md:static absolute bg-[#123524] md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                    <ul
                        class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.kecamatan-dashboard') }}">Dashboard</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-kelurahan') }}">Daftar Kelurahan</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-surat-keluar') }}">Daftar Surat Keluar</a></li>
                    </ul>
                </div>
            @else
                <!-- Navbar untuk Warga -->
                <div
                    class="nav-links duration-500 md:static absolute bg-[#123524] md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                    <ul
                        class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.profil') }}">Profil</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.layanan-surat') }}">Layanan Surat</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.informasi-tani') }}">Informasi Tani</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.beri-saran') }}">Beri Saran</a></li>
                    </ul>
                </div>
            @endif
        @endif

        <!-- Tombol Logout -->
        <div class="flex items-center gap-6">
            <form
                action="{{ route(Auth::user()->role === 'kelurahan' ? 'logoutAdmin' : (Auth::user()->role === 'superadmin' ? 'logoutSuperAdmin' : 'citizen.logout')) }}"
                method="POST" style="display: inline;">
                @csrf
                <button type="submit"
                    class="bg-[#3E7B27] text-[#1B1A17] font-bold px-5 py-2 rounded-full hover:bg-white ease-out duration-300">
                    Log Out
                </button>
            </form>
            <!-- Burger Bar Icon -->
            <button class="text-3xl cursor-pointer md:hidden w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10"
                aria-label="Toggle Navigation Menu" aria-expanded="false" id="menu-toggle">
            </button>
        </div>
    </nav>
</header>
