<!-- resources/views/components/header.blade.php -->
<header class="bg-[#842222] absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="{{ route ('dashboard') }}" class="max-w-29 block py-7"><img src="{{ asset('image/logo.png') }}" alt="logo"></a>
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
                            <a href="/dashboard" class="text-base font-medium text-slate-500 py-2 mx-8 flex group-hover:text-[#842222]">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="/dataview_admin" class="text-base font-medium text-slate-500 py-2 mx-8 flex  group-hover:text-[#842222]">Lihat Daftar</a>
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
