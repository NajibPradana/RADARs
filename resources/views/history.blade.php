<x-app-layout>
    <x-slot name="header">
        <x-header_admin />
    </x-slot>
    
     <!-- Main form Section -->
     <section class="lg:px-20">
        <div class="container">
            <div class="block w-full pt-24 pb-11 px-4 lg:flex lg:flex-col lg:items-center">
                <h2 class="font-bold text-[18px] lg:text-3xl pb-4 text-center">RIWAYAT INPUT DATA ARSIP</h2>
            </div>
            <div class="px-4 w-full lg:px-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div class="ml-4 mt-4">
                            <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                                <svg class="w-3 h-3 text-gray-500 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                </svg>
                                <span>Terbaru</span>
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            
                            <!-- Dropdown menu -->
                            <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow" style="position: absolute;">
                                <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input id="filter-radio-example-1" type="radio" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900">Terbaru</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input checked id="filter-radio-example-2" type="radio" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900">7 Hari Terakhir</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input id="filter-radio-example-3" type="radio" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900">30 Hari Terakhir</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input id="filter-radio-example-4" type="radio" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900">Sebulan Terakhir</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input id="filter-radio-example-5" type="radio" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900">Satahun Terakhir</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Informasi Arsip
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kode Klasifikasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    waktu Data Masuk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Author
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arsips as $index => $arsip)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $arsip->uraian_informasi }}</td>
                                    <td class="px-6 py-4">{{ $arsip->kode_klasifikasi }}</td>
                                    <td class="px-6 py-4">{{ $arsip->kurun_waktu }}</td>
                                    <td class="px-6 py-4">{{ $arsip->user->name }}</td> <!-- Menampilkan nama user -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="px-4 pb-4">
                        {{ $arsips->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main form END -->
    
    <x-footer />
    
    @vite(['resources/js/app.js', 'resources/js/lembaga-select.js', 'resources/js/dropdown.js'])
     
    
    </x-app-layout>
    