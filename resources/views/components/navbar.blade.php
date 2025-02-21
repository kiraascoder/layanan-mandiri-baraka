<header class="bg-[#123524] sticky top-0 z-50 w-full">
    <nav class="flex justify-between items-center w-[92%] mx-auto font-scope-one relative py-4">
        <div class="flex items-center gap-4">
            <div class="w-20 p-4">
                <a href="/">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Website Logo" class="w-32">
                </a>
            </div>
            <div class="text-white text-xl font-semibold">
                Layanan Mandiri
                <p>Kecamatan Baraka</p>
            </div>
        </div>
        <button id="menu-toggle" class="md:hidden text-white text-3xl cursor-pointer">
            &#9776;
        </button>
        @if (Auth::check())
            <div id="nav-menu"
                class="nav-links md:static absolute bg-[#123524] md:min-h-fit min-h-[60vh] left-0 top-0 md:w-auto w-full flex md:flex-row flex-col items-center px-5 transition-transform transform md:translate-y-0 translate-y-[-100%] md:opacity-100 opacity-0 ease-in-out duration-300">
                <ul
                    class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                    @if (Auth::user()->role == 'kelurahan')
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-penduduk') }}">Daftar Penduduk</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.management-surat') }}">Management Surat</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.masukan') }}">Masukan</a></li>
                    @elseif (Auth::user()->role == 'superadmin')
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.kecamatan-dashboard') }}">Dashboard</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-kelurahan') }}">Daftar Kelurahan</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('admin.daftar-surat-keluar') }}">Daftar Surat Keluar</a></li>
                    @else
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.profil') }}">Profil</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.layanan-surat') }}">Layanan Surat</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.informasi-tani') }}">Informasi Tani</a></li>
                        <li><a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                                href="{{ route('citizen.beri-saran') }}">Beri Saran</a></li>
                    @endif
                </ul>
                <div class="md:hidden mt-4">
                    <form
                        action="{{ route(Auth::user()->role === 'kelurahan' ? 'logoutAdmin' : (Auth::user()->role === 'superadmin' ? 'logoutSuperAdmin' : 'citizen.logout')) }}"
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-[#3E7B27] text-[#1B1A17] font-bold px-5 py-2 rounded-full hover:bg-white ease-out duration-300">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        @endif
        <div class="hidden md:flex items-center gap-6">
            <form
                action="{{ route(Auth::user()->role === 'kelurahan' ? 'logoutAdmin' : (Auth::user()->role === 'superadmin' ? 'logoutSuperAdmin' : 'citizen.logout')) }}"
                method="POST">
                @csrf
                <button type="submit"
                    class="bg-[#3E7B27] text-[#1B1A17] font-bold px-5 py-2 rounded-full hover:bg-white ease-out duration-300">
                    Log Out
                </button>
            </form>
        </div>
    </nav>
</header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const navMenu = document.getElementById('nav-menu');
        const isOpen = navMenu.classList.contains('translate-y-0');
        navMenu.classList.toggle('translate-y-0', !isOpen);
        navMenu.classList.toggle('opacity-100', !isOpen);
        navMenu.classList.toggle('translate-y-[-100%]', isOpen);
        navMenu.classList.toggle('opacity-0', isOpen);
    });
</script>
