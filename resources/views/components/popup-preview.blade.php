<div id="previewPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 w-3/4 max-h-[80vh]"> <!-- Set width to 3/4, but no scroll on this container -->
        <h3 class="text-2xl font-bold mb-4">Pratinjau Berkas</h3>
        <div id="previewContent" class="mb-4 max-h-[55vh] overflow-y-auto"> <!-- Scroll only the table, with max height -->
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No.</th>
                        <th class="px-4 py-2 border">Informasi</th>
                        <th class="px-4 py-2 border">Kode</th>
                        <th class="px-4 py-2 border">Waktu</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Aktif</th>
                        <th class="px-4 py-2 border">Inaktif</th>
                        <th class="px-4 py-2 border">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsips as $index => $arsip)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $arsip->uraian_informasi }}</td>
                            <td class="px-6 py-4">{{ $arsip->kode_klasifikasi }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end space-x-2">
            <button id="closePopup" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Tutup
            </button>
            <button id="downloadFile" class="bg-[#FDA43C] hover:bg-[#eb8c20] text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('export_arsip', ['lembaga_id' => $arsip->lembaga_id]) }}" class="btn btn-success">Unduh</a>
            </button>
        </div>
    </div>
</div>