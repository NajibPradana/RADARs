<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(/image/bg.png)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">RADARs</h2>
                    <p class="max-w-xl mt-3 text-gray-300">RADARs : Rekap Data Arsip Internal Semarang</p>
                    <p class="max-w-xl mt-3 text-gray-300">Selamat datang, website ini memiliki fungsi untuk dapat melaukan input data arsip dengan lebih mudah dan cepat. Jangan Lupa untuk membuat akun terlebih dulu sebelum menggunakan</p>
                </div>
            </div>
        </div>

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">MASUK</h2>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Silahkan isi untuk Masuk ke akun anda</p>
                </div>

                <div class="mt-8">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <x-input-label for="password" :value="__('Kata Sandi')" />
                                
                            </div>
                            <div class="relative">
                                <x-text-input id="password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" type="password" name="password" required autocomplete="current-password" />
                                <span onclick="togglePassword()" class="absolute inset-y-0 right-4 flex items-center cursor-pointer">
                                    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 10c1.73 2.39 6 5.5 11 5.5s9.27-3.11 11-5.5c-1.73-2.39-6-5.5-11-5.5zM12 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8.75a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z"/>
                                    </svg>

                                    <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                                        <path d="M2.2 2.2L1.15 3.25l3.54 3.54c-1.16.65-2.24 1.45-3.19 2.38C2.73 13.89 7 17 12 17c2.03 0 4.01-.47 5.78-1.4l3.08 3.08 1.06-1.05-16.72-16.72L2.2 2.2zM5.16 8.34l1.27 1.27c-.13.38-.23.78-.23 1.18 0 2.21 1.79 4 4 4 .4 0 .8-.1 1.18-.23l1.27 1.27c-1.18.39-2.44.61-3.72.61-4.83 0-8.98-2.88-11-7.25C3.02 7.88 7.17 5 12 5c1.28 0 2.54.22 3.72.61L15.18 6.9l-1.27-1.27c-.38-.13-.78-.23-1.18-.23-2.21 0-4 1.79-4 4 0 .4.1.8.23 1.18L5.16 8.34zM8.4 9.86c-.21-.57-.4-1.15-.57-1.72C7.51 7.52 8.21 7 9 7c1.1 0 2 .9 2 2 0 .79-.52 1.49-1.14 1.97-.57-.17-1.15-.36-1.72-.57-.42-.14-.83-.3-1.24-.5z"/>
                                    </svg>
                                </span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
                            </label>
                        </div>

                        <div class="mt-6">
                            <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Belum memiliki akun? 
                    <a href='register' class="text-blue-500 focus:outline-none focus:underline hover:underline">Buat Akun</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var eyeOpenIcon = document.getElementById('eye-open');
        var eyeClosedIcon = document.getElementById('eye-closed');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeOpenIcon.style.display = 'none';
            eyeClosedIcon.style.display = 'block';
        } else {
            passwordField.type = 'password';
            eyeOpenIcon.style.display = 'block';
            eyeClosedIcon.style.display = 'none';
        }
    }
</script>
