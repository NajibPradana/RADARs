<x-app-layout>
    <x-slot name="header">
        <x-header />
        
        @vite(['resources/js/app.js', 'resources/js/delete-confirmation.js'])
    </x-slot>
   


    <!-- Main form Section -->
    <section class="pt-16">
        <div class="container mx-auto pt-18 pb-28 px-4 lg:px-28">
            <div class="block w-full lg:justify-center lg:items-center">
                <h2 class="font-bold text-[25px] lg:text-3xl pb-6 text-center">FORM EDIT DATA ARSIP</h2>
                <form id="arsip-form" action="{{ route('arsip.update', $arsip->arsip_id) }}" method="POST" data-arsip-id="{{ $arsip->arsip_id }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Input fields -->
                    <div class="lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="lembaga" class="text-sm font-bold">Nama Lembaga</label>
                            <input type="text" name="lembaga_id" id="lembaga" value="{{ $arsip->lembaga->nama_lembaga }}" disabled class="w-full rounded-md bg-gray-300 border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                        </div>
                        <div class="w-full lg:w-1/2 lg:flex lg:space-x-4">
                            <div class="w-full lg:w-1/2">
                                <label for="kode" class="text-sm font-bold">Kode Klasifikasi</label>
                                <input type="text" name="kode_klasifikasi" id="kode" value="{{ old('kode_klasifikasi', $arsip->kode_klasifikasi) }}" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                @error('kode_klasifikasi')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="waktu" class="text-sm font-bold">Kurun Waktu</label>
                                <input type="date" name="kurun_waktu" id="waktu" value="{{ old('kurun_waktu', $arsip->kurun_waktu) }}" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                @error('kurun_waktu')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="info-arsip" class="text-sm font-bold">Informasi Arsip</label>
                        <textarea name="uraian_informasi" id="info-arsip" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">{{ old('uraian_informasi', $arsip->uraian_informasi) }}</textarea>
                        @error('uraian_informasi')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/3">
                            <label for="jumlah" class="text-sm font-bold">Jumlah</label>
                            <div class="flex space-x-2">
                                <div class="w-1/3">
                                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $arsip->jumlah) }}" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                    @error('jumlah')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-1/2">
                                    <select name="jenis_arsip" id="jumlah-tipe" class="w-full appearance-none rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                                        <option value="Berkas" {{ old('jenis_arsip', $arsip->jenis_arsip) == 'Berkas' ? 'selected' : '' }}>Berkas</option>
                                        <option value="Bendel" {{ old('jenis_arsip', $arsip->jenis_arsip) == 'Bendel' ? 'selected' : '' }}>Bendel</option>
                                        <option value="Lembar" {{ old('jenis_arsip', $arsip->jenis_arsip) == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                                    </select>
                                    @error('jenis_arsip')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- Nomor Identitas -->
                            <div class="w-full mt-1">
                                <label for="kode" class="text-sm font-bold">Nomor Identitas</label>
                                <input type="text" name="nomor_identitas" value="{{ old('nomor_identitas', $arsip->nomor_identitas) }}" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            </div>
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label for="retensi-aktif" class="text-sm font-bold">Retensi Aktif</label>
                            <input type="number" name="retensi_aktif" id="retensi-aktif" value="{{ old('retensi_aktif', $arsip->retensi_aktif) }}" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            @error('retensi_aktif')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <label for="retensi-inaktif" class="text-sm font-bold mt-2 block">Retensi Inaktif</label>
                            <input type="number" name="retensi_inaktif" id="retensi-inaktif" value="{{ old('retensi_inaktif', $arsip->retensi_inaktif) }}" min="1" class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]">
                            @error('retensi_inaktif')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label for="keterangan" class="text-sm font-bold">Keterangan</label>
                            <div class="flex flex-col space-y-2">
                                <div>
                                    <input {{ old('asli', $arsip->kondisi_asli) == 'Asli' ? 'checked' : '' }} type="checkbox" id="opsi1" name="asli" value="Asli">
                                    <label for="opsi1"> Asli</label>
                                </div>
                                <div>
                                    <input {{ old('tekstual', $arsip->kondisi_tekstual) == 'Tekstual' ? 'checked' : '' }} type="checkbox" id="opsi2" name="tekstual" value="Tekstual">
                                    <label for="opsi2"> Tekstual</label>
                                </div>
                                <div>
                                    <input {{ old('baik', $arsip->kondisi_baik) == 'Kondisi arsip baik' ? 'checked' : '' }} type="checkbox" id="opsi3" name="baik" value="Kondisi arsip baik">
                                    <label for="opsi3"> Kondisi arsip baik</label>
                                </div>
                                <div>
                                    <input {{ old('keterangan_lain', $arsip->keterangan_lain) ? 'checked' : '' }} type="checkbox" onclick="var input = document.getElementById('keterangan-lain'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />
                                    <label for="opsi4"> Lainnya</label>
                                    <input id="keterangan-lain" name="keterangan_lain" value="{{ old('keterangan_lain', $arsip->keterangan_lain) }}" {{ old('keterangan_lain', $arsip->keterangan_lain) ? '' : 'disabled' }} class="w-full rounded-md bg-white border border-slate-900 p-2 text-dark focus:border-[#842222] focus:outline-none focus:ring-1 focus:ring-[#842222]" />
                                </div>
                            </div>                        
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2 pt-4">
                        <!-- Delete Button -->
                        <button type="button" class="w-1/3 lg:w-28 rounded-md bg-slate-300 border border-slate-600 p-2 text-slate-600 hover:bg-slate-400 hover:border-slate-500 hover:outline-none hover:ring-1 hover:ring-slate-500" onclick="confirmDelete({{ $arsip->arsip_id }})">Hapus</button>
                        
                        <!-- Save Button -->
                        <button type="submit" class="w-1/3 lg:w-28 rounded-md bg-[#842222] p-2 text-white hover:bg-[#5e1818] hover:outline-none hover:ring-1 hover:ring-[#842222]">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Main form END -->

    <x-footer />
<script>
    function confirmDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        document.getElementById('arsip-form').action = "{{ route('arsip.destroy', $arsip->arsip_id) }}";
        document.getElementById('arsip-form').method = 'POST';
        document.getElementById('arsip-form').appendChild(createInput('_method', 'DELETE'));
        document.getElementById('arsip-form').submit();
    }
}

</script>
   
</x-app-layout>
