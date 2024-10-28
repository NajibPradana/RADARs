<x-app-layout>
    <x-slot name="header">
        <header class="bg-[#842222] absolute top-0 left-0 w-full flex items-center z-10">
            <div class="container">
                <div class="flex items-center justify-between relative">
                    <div class="px-4">
                        <a href="#Beranda" class="max-w-29 block py-7"><img src="./image/logo.png" alt="logo"></a>
                    </div>
                    <div class="flex items-center px-4">
                        <button id="hamburger" name="hamburger" type="button" class="block absolute right-4">
                            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        </button>
                        <nav id="nav-menu" class="hidden absolute py-6 bg-white shadow-lg max-w-[200px] w-full right-4 top-full">
                            <ul class="block">
                                <li class="group">
                                    <a href="/profile" class="text-base font-medium text-slate-500 py-2 mx-8 flex group-hover:text-[#842222]">Informasi Akun</a>
                                </li>
                                <li class="group">
                                    <a href="/dashboard" class="text-base font-medium text-slate-500 py-2 mx-8 flex group-hover:text-[#842222]">Beranda</a>
                                </li>
                                <li class="group">
                                    <a href="/data_view" class="text-base font-medium text-slate-500 py-2 mx-8 flex  group-hover:text-[#842222]">Lihat Daftar</a>
                                </li>
                                <li class="group">
                                    <a href="/history" class="text-base font-medium text-slate-500 py-2 mx-8 flex  group-hover:text-[#842222]">Riwayat</a>
                                </li>
                                <li class="group">
                                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                        @csrf
                                        <button type="submit" class="text-base font-medium text-slate-500 py-2 mx-8 flex group-hover:text-[#842222]">
                                            Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex flex-col lg:flex-row gap-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full lg:w-1/2">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full lg:w-1/2">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    <x-footer />

</x-app-layout>
