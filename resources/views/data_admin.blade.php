<x-app-layout>
    <x-slot name="header">
        <x-header_admin />
    </x-slot>

 <!-- Main form Section -->
 <section>
    <div class="container">
        <div class="block w-full py-28 px-4 lg:flex lg:flex-col lg:items-center">
            <h2 class="font-bold text-[18px] lg:text-3xl pb-4 text-center">DAFTAR DATA ARSIP</h2>
            <div class="w-full lg:w-1/4 mb-4">
                <select id="lembaga-select" class="w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Lembaga</option>
                    @foreach($lembagas as $lembaga)
                        <option value="{{ $lembaga->lembaga_id }}">{{ $lembaga->nama_lembaga }}</option>
                    @endforeach
                </select>
            </div>            
        </div>
        <div class="px-4 w-full lg:px-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No.</th>

                            <th scope="col" class="px-6 py-3">ID</th>
                            
                            <th class="px-6 py-3">
                                <a href="{{ route('data_view', [
                                    'sort' => 'kode_klasifikasi', 
                                    'direction' => request('sort') === 'kode_klasifikasi' && request('direction') === 'asc' ? 'desc' : 'asc',
                                    'search' => request('search'), 
                                    'column' => request('column'),
                                    'lembaga_id' => request('lembaga_id')
                                ]) }}" class="flex items-center">
                                    Kode Klasifikasi
                                    @if (request('sort') === 'kode_klasifikasi')
                                        @if (request('direction') === 'asc')
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </a>
                            </th>

                            <th class="px-6 py-3">
                                <a href="{{ route('data_view', [
                                    'sort' => 'uraian_informasi', 
                                    'direction' => request('sort') === 'uraian_informasi' && request('direction') === 'asc' ? 'desc' : 'asc',
                                    'search' => request('search'), 
                                    'column' => request('column'),
                                    'lembaga_id' => request('lembaga_id')
                                ]) }}" class="flex items-center">
                                    Informasi Arsip
                                    @if (request('sort') === 'uraian_informasi')
                                        @if (request('direction') === 'asc')
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            
                            
                            
                            <th class="px-6 py-3">
                                <a href="{{ route('data_view', [
                                    'sort' => 'kurun_waktu', 
                                    'direction' => request('sort') === 'kurun_waktu' && request('direction') === 'asc' ? 'desc' : 'asc',
                                    'search' => request('search'), 
                                    'column' => request('column'),
                                    'lembaga_id' => request('lembaga_id')
                                ]) }}" class="flex items-center">
                                    Kurun Waktu
                                    @if (request('sort') === 'kurun_waktu')
                                        @if (request('direction') === 'asc')
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            
                            <th scope="col" class="px-6 py-3">Jumlah</th>
                            <th scope="col" class="px-6 py-3">Retensi Aktif</th>
                            <th scope="col" class="px-6 py-3">Retensi Inaktif</th>
                            <th scope="col" class="px-6 py-3">Keterangan</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arsips as $index => $arsip)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $arsip->nomor_identitas }}</td>
                                <td class="px-6 py-4">{{ $arsip->kode_klasifikasi }}</td>
                                <td class="px-6 py-4">{{ $arsip->uraian_informasi }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($arsip->kurun_waktu)->format('Y') }}</td>
                                <td class="px-6 py-4">{{ $arsip->jumlah }} {{ $arsip->jenis_arsip }}</td>
                                <td class="px-6 py-4">{{ $arsip->retensi_aktif }}</td>
                                <td class="px-6 py-4">{{ $arsip->retensi_inaktif }}</td>
                                <td class="px-6 py-4">
                                    <ul>
                                        <li>{{ $arsip->kondisi_asli }}</li>
                                        <li>{{ $arsip->kondisi_tekstual }}</li>
                                        <li>{{ $arsip->kondisi_baik }}</li>
                                        <li>{{ $arsip->keterangan_lain }}</li>
                                    </ul>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('edit_data', ['id' => $arsip->arsip_id]) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-start mt-4">
                    <a href="{{ route('export_arsip', ['lembaga_id' => $arsip->lembaga_id]) }}" id="exportBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export</a>

                </div>
                
                <div id="base-url" data-url="{{ route('data_view') }}"></div>

                <div class="px-4">
                    {{ $arsips->appends(request()->except('page'))->links() }}
                </div>

                

            </div>
        </div>

    
        
        
        
        
        
        
        <x-footer />
    </div>
        
</section>
<!-- Main form END -->


 @vite(['resources/js/app.js', 'resources/js/lembaga-select.js', 'resources/js/dropdown.js', 'resources/js/pop_up.js'])


 

</x-app-layout>