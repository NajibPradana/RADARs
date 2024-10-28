<x-app-layout>
    <x-slot name="header">
        <x-header />
    </x-slot>

    <!-- Main form Section -->
    <section class="pt-16">
        <div class="container mx-auto pt-18 pb-28 px-4 lg:px-28">
            <div class="block w-full lg:justify-center lg:items-center">
                <h2 class="font-bold text-[25px] lg:text-3xl pb-6 text-center">FORM INPUT DATA ARSIP</h2>
                
                <!-- Display success message -->
                @if(session('status'))
                    <div class="bg-green-200 text-green-800 p-4 rounded mb-6">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('input_form_submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="lembaga_id" value="{{ $lembaga->lembaga_id }}">
                    
                    <div class="lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="lembaga" class="text-sm font-bold">Nama Lembaga</label>
                            <input type="text" disabled id="lembaga" value="{{ $lembaga->nama_lembaga }}" class="w-full rounded-md bg-gray-300 border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                        </div>
                        <div class="w-full lg:w-1/2 lg:flex lg:space-x-4">
                            <div class="w-full lg:w-1/2">
                                <label for="kode" class="text-sm font-bold">Kode Klasifikasi</label>
                                <input type="text" id="kode" name="kode" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="waktu" class="text-sm font-bold">Kurun Waktu</label>
                                <input type="date" id="waktu" name="waktu" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="info-arsip" class="text-sm font-bold">Informasi Arsip</label>
                        <textarea name="info-arsip" id="info-arsip" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]"></textarea>
                    </div>
                    <div class="lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/3">
                            <label for="jumlah" class="text-sm font-bold">Jumlah</label>
                            <div class="flex space-x-2">
                                <div class="w-1/3">
                                    <input type="number" id="jumlah" name="jumlah" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                </div>
                                <div class="w-2/3">
                                    <select id="jumlah-tipe" name="jumlah-tipe" class="w-full appearance-none rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                        <option value="Berkas">Berkas</option>
                                        <option value="Bendel">Bendel</option>
                                        <option value="Lembar">Lembar</option>
                                    </select>
                                </div>
                            
                            </div>
                            <div class="w-full mt-1">
                                <label for="kode" class="text-sm font-bold">Nomor Identitas</label>
                                <input type="text" id="nomor_identitas" name="nomor_identitas" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            </div>
                        </div>

                        <div class="w-full lg:w-1/3">
                            <label for="retensi-aktif" class="text-sm font-bold">Retensi Aktif</label>
                            <input type="number" id="retensi-aktif" name="retensi-aktif" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            <label for="retensi-inaktif" class="text-sm font-bold mt-2 block">Retensi Inaktif</label>
                            <input type="number" id="retensi-inaktif" name="retensi-inaktif" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label for="keterangan" class="text-sm font-bold">Keterangan</label>
                            <div class="flex flex-col space-y-2">
                                <div>
                                    <input type="checkbox" id="opsi1" name="asli" value="Asli">
                                    <label for="opsi1"> Asli</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="opsi2" name="tekstual" value="Tekstual">
                                    <label for="opsi2"> Tekstual</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="opsi3" name="baik" value="Kondisi arsip baik">
                                    <label for="opsi3"> Kondisi arsip baik</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="opsi4" onclick="var input = document.getElementById('lainnya'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />
                                    <label for="opsi4"> Lainnya</label>
                                    <input id="lainnya" name="lainnya" disabled class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2 pt-4">
                        <input type="reset" value="Reset" class="w-1/3 lg:w-28 rounded-md bg-gray-300 hover:bg-gray-400 text-dark font-medium py-2 px-4">
                        <button type="submit" class="w-1/3 lg:w-28 bg-[#842222] hover:bg-[#561818] text-white font-medium py-2 px-4 rounded">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <x-footer />

    <script src="{{ asset('resource/js/script.js') }}"></script>
</x-app-layout>
