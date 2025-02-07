<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="container h-full p-10">
        <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <!-- Left column container -->
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12">
                                <!-- Logo -->
                                <div class="text-center">
                                    <img class="mx-auto w-36 mb-2" src="{{ asset('img/logo/logo.png') }}"
                                        alt="logo" />
                                    <h4 class="mb-8 mt-1 pb-1 text-xl font-semibold text-black">LAYANAN MANDIRI
                                        KECAMATAN BARAKA
                                    </h4>
                                    @if ($errors->has('login'))
                                        <div class="alert alert-danger mt-3">{{ $errors->first('login') }}</div>
                                    @endif
                                </div>
                                <form action="{{ route('AdminLogin.submit') }}" method="POST">
                                    @csrf
                                    <p class="mb-4 text-black">Silahkan Masukan Email dan Password Anda</p>
                                    <!-- Email Input -->
                                    <div class="relative mb-4">
                                        <input type="text" id="email" name="email"
                                            class="peer block w-full rounded  bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all dark:text-white dark:placeholder:text-neutral-300 text-black border-2 border-gray-600"
                                            placeholder="Email" value="{{ old('email') }}" required />
                                        @error('email')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Password Input -->
                                    <div class="relative mb-4">
                                        <input type="password" id="password" name="password"
                                            class="peer block w-full rounded  bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all dark:text-white dark:placeholder:text-neutral-300 text-black border-2 border-gray-600"
                                            placeholder="Password" required />
                                        @error('password')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Submit button -->
                                    <div class="mb-12 pb-1 pt-1 text-center">
                                        <button class="w-full rounded px-6 py-2 text-white bg-[#85A947]" type="submit">
                                            Log in
                                        </button>

                                    </div>
                                    <!-- Register and Admin Login -->
                                    <div class="flex justify-between pb-6">
                                        <a href="{{ route('login') }}" class="text-sm text-blue-500">Login
                                            sebagai Warga</a>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Right column container with background and description -->
                        <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        import {
            Input,
            Ripple,
            initTWE,
        } from "tw-elements";

        initTWE({
            Input,
            Ripple
        });
    </script>
</body>

</html>
