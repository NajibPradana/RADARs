<x-app-layout>
    <x-slot name="header">
        <x-header />
    </x-slot>
    

    <div class="container mx-auto mt-0">
       <!-- Hero Section -->
       <section id="Beranda" class="pt-36 pb-20" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/image/bg.png); background-position: center; background-size: cover;">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold text-[32px] lg:text-[48px] text-white mb-4">Selamat Datang.</h4>
                <p class="font-normal text-white text-base">Silahkan pilih sebuah lembaga, kemudian lanjutkan aksi dengan menekan tombol <span class="font-black">Masukan</span> untuk menambahkan data arsip baru, atau <span class="font-black">Lihat</span> untuk menampilkan tabel daftar data arsip dari lembaga tersebut.</p>
            </div>
            <div class="w-full px-4 flex justify-center">
                <div class="min-w-[350px] md:min-w-96 md:flex md:flex-wrap lg:flex lg:flex-wrap p-2 bg-white items-center rounded-md justify-center lg:min-w-[600px] shadow-lg">
                    <div class="flex md:w-3/5 md:pr-2 lg:w-3/5 lg:pr-2">
                        <select id="lembaga-select" class="w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Pilih Lembaga</option>
                            @foreach ($lembagas as $lembaga)
                                <option value="{{ $lembaga->lembaga_id }}">{{ $lembaga->nama_lembaga }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex space-x-2 items-center md:w-2/5 lg:w-2/5">
                        <button id="btn-masukan" class="mt-2 md:mt-0 lg:mt-0 w-1/2 bg-[#842222] hover:bg-[#561818] text-white font-medium py-2 px-4 rounded items-center" data-input-url="{{ url('/input_form') }}">
                            <span>Masukan</span>
                        </button>
                        <button id="btn-lihat" class="mt-2 md:mt-0 lg:mt-0 w-1/2 bg-[#FDA43C] hover:bg-[#eb8c20] text-white font-medium py-2 px-4 rounded" data-view-url="{{ url('/data_view') }}">
                            Lihat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

        <!-- About Section -->
        <section id="About" class="pt-16">
            <div class="w-full px-4">
                <div class="max-w-3xl mx-auto text-center mb-16">
                    <h4 class="font-bold text-[32px] lg:text-[48px] text-black mb-4">Tentang <span class="text-[#842222]">RADARs</span></h4>
                    <div class="space-y-4 lg:flex lg:space-x-4 lg:space-y-0">
                        <p class="font-medium text-gray-600 lg:text-end lg:w-1/2">RADARS adalah aplikasi berbasis web yang dirancang serta dikembangkan untuk merekap informasi data arsip pada Dinas Arsip dan Perpustakaan Kota Semarang.</p>
                        <p class="font-medium text-gray-600 lg:text-start lg:w-1/2">Beberapa fitur utama dari RADARs antara lain melakukan input informasi data arsip, melihat daftar data arsip dengan urutan tertentu, serta mengekspor daftar data arsip yang telah ada.</p>
                    </div>
                </div>
            </div>
        </section>

        <x-footer />

    </div>
    
   
    
    @vite(['resources/js/app.js', 'resources/js/dashboard_button.js'])


</x-app-layout>
