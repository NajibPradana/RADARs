<x-app-layout>
    <x-slot name="header">
        <x-header_admin />
    </x-slot>
    

    <div class="container mx-auto mt-0 ">
       <!-- Hero Section -->
       <section id="Beranda" class="pt-36 pb-20" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/image/bg.png); background-position: center; background-size: cover;">
        <div class="w-full px-4 lg:px-20">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold text-[32px] lg:text-[48px] text-white mb-4">Selamat Datang ADMIN.</h4>
                <p class="font-base text-white text-base">Silahkan pilih sebuah lembaga, kemudian lanjutkan aksi dengan menekan tombol <span class="font-black">Masukan</span> untuk menambahkan data arsip baru, atau <span class="font-black">Lihat</span> untuk menampilkan tabel daftar data arsip dari lembaga tersebut. Atau buat lembaga baru pada kolom input <span class="font-black">Tambah Lembaga</span>.</p>
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
                        <button id="btn-lihat" class="mt-2 md:mt-0 lg:mt-0 w-1/2 bg-[#FDA43C] hover:bg-[#eb8c20] text-white font-medium py-2 px-4 rounded" data-view-url="{{ url('/dataview_admin') }}">
                            Lihat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

        <!-- About Section -->
        <section>
            <div class="container">
                <div class="max-w-3xl mx-auto text-center mb-16 pt-16 px-4">
                    <h4 class="font-bold text-[32px] lg:text-[48px] text-black mb-4">Tambahkan <span class="text-[#842222]">Lembaga</span></h4>
                    <div class="w-full md:w-2/3 lg:w-1/2 mx-auto">
                        <form action="{{ route('lembaga.store') }}" method="POST" class="flex flex-col md:flex-row md:space-x-4">
                            @csrf
                            <input id="nama-lembaga" name="nama_lembaga" type="text" placeholder="Masukkan nama lembaga" class="flex-1 appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-4 md:mb-0">
                            <button type="submit" class="bg-[#842222] hover:bg-[#6c1c1c] text-white font-bold py-2 px-4 rounded w-full md:w-auto">
                                Tambah
                            </button>
                        </form>
                    </div>
                </div> 
                
                  <!-- Mengurangi padding pada div di bawahnya untuk mendekatkan tabel -->
            <div class="flex justify-center items-center pt-2"> <!-- Gunakan pt-8 untuk menyesuaikan jarak dari bagian atas -->
                <table class="max-w-xl lg:w-1/2 text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Lembaga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lembagas as $index => $lembaga)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lembaga->nama_lembaga }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <form action="{{ route('lembaga.destroy', ['id' => $lembaga->lembaga_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lembaga?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                
            </div>
        </section>

        <x-footer />

    </div>
    
   
    
    @vite(['resources/js/app.js', 'resources/js/dashboard_button.js'])


</x-app-layout>
