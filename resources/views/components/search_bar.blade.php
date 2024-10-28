<form method="GET" action="{{ route('data_view') }}" class="flex flex-wrap items-center">
    <div class="relative w-full sm:w-auto">
        <input type="text" name="search" id="table-search" value="{{ request('search') }}" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#842222] focus:border-[#842222]" placeholder="Search for items">
    </div>
    <div class="relative w-full sm:w-auto mt-2 sm:mt-0 sm:ml-2">
        <select name="column" class="block w-full sm:min-w-[200px] p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-slate-500 focus:border-slate-500">
            <option value="uraian_informasi" {{ request('column') == 'uraian_informasi' ? 'selected' : '' }}>Informasi Arsip</option>
            <option value="kode_klasifikasi" {{ request('column') == 'kode_klasifikasi' ? 'selected' : '' }}>Kode Klasifikasi</option>
            <!-- Tambahkan opsi lain sesuai kebutuhan -->
        </select>
        
    </div>
    <!-- Sertakan ID lembaga yang dipilih -->
    <input type="hidden" name="lembaga_id" value="{{ request('lembaga_id') }}">
    <button type="submit" class="w-full sm:w-auto mt-2 sm:mt-0 sm:ml-2 p-2 text-white bg-[#842222] rounded-lg">Search</button>
</form>