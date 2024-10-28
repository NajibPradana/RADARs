<?php
namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Arsip::query();
        

        
        // Filtering by lembaga_id if selected
        if ($request->has('lembaga_id') && $request->lembaga_id != '') {
            $query->where('lembaga_id', $request->lembaga_id);
        }
    
        // Handling search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where($request->column, 'like', '%' . $request->search . '%');
        }
    
        // Sorting
        if ($request->has('sort') && $request->sort != '') {
            switch ($request->sort) {
                case 'uraian_informasi':
                    $query->orderBy('uraian_informasi', $request->direction == 'desc' ? 'desc' : 'asc');
                    break;
                case 'kode_klasifikasi':
                    $query->orderBy('kode_klasifikasi', $request->direction == 'desc' ? 'desc' : 'asc');
                    break;
                case 'kurun_waktu':
                    $query->orderBy('kurun_waktu', $request->direction == 'desc' ? 'desc' : 'asc');
                    break;
                default:
                    // Default sorting if needed
                    break;
            }
        }
    
        // Filtering by time range if selected
        if ($request->has('time_filter') && $request->time_filter != '') {
            $now = \Carbon\Carbon::now();
            switch ($request->time_filter) {
                case '7_days':
                    $query->where('created_at', '>=', $now->subDays(7));
                    break;
                case '30_days':
                    $query->where('created_at', '>=', $now->subDays(30));
                    break;
                case '1_month':
                    $query->where('created_at', '>=', $now->subMonth());
                    break;
                case '1_year':
                    $query->where('created_at', '>=', $now->subYear());
                    break;
            }
        }
    
        $sortDirection = $request->input('direction', 'asc'); // Default sorting direction

        // Apply the sorting with priority
        $query->orderByRaw("kode_klasifikasi {$sortDirection}, kurun_waktu {$sortDirection}, uraian_informasi {$sortDirection}");

        // Ambil jumlah data per halaman dari request, default 10
        $perPage = $request->input('per_page', 10);

        // Ambil data arsip dengan paginasi
        $arsips = Arsip::paginate($perPage);

    
        return view('data_view', compact('arsips'));
    }
    


    public function create(Request $request)
    {
        $lembaga_id = $request->query('lembaga_id');
        $lembaga = Lembaga::find($lembaga_id);

        // Pastikan $lembaga tidak null
        if (!$lembaga) {
            return redirect()->route('dashboard')->withErrors('Lembaga tidak ditemukan.');
        }

        return view('input_form', ['lembaga' => $lembaga]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lembaga_id' => 'required|exists:lembaga,lembaga_id',
            'nomor_identitas' => 'required|string',
            'kode' => 'required|string',
            'info-arsip' => 'required|string',
            'waktu' => 'required|date',
            'jumlah' => 'required|integer',
            'jumlah-tipe' => 'required|string',
            'retensi-aktif' => 'required|string',
            'retensi-inaktif' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Arsip::create([
            'lembaga_id' => $request->input('lembaga_id'),
            'user_id' => Auth::id(), // Ambil user ID dari user yang sedang login
            'nomor_identitas' => $request->nomor_identitas, // Pastikan ini diisi
            'kode_klasifikasi' => $request->input('kode'),
            'uraian_informasi' => $request->input('info-arsip'),
            'kurun_waktu' => $request->input('waktu'),
            'jumlah' => $request->input('jumlah'),
            'jenis_arsip' => $request->input('jumlah-tipe'),
            'retensi_aktif' => $request->input('retensi-aktif'),
            'retensi_inaktif' => $request->input('retensi-inaktif'),
            'kondisi_asli' => $request->input('asli') ? 'Asli' : null,
            'kondisi_tekstual' => $request->input('tekstual') ? 'Tekstual' : null,
            'kondisi_baik' => $request->input('baik') ? 'Kondisi arsip baik' : null,
            'keterangan_lain' => $request->input('lainnya'),
        ]);

        return redirect()->route('input_form', ['lembaga_id' => $request->input('lembaga_id')])
            ->with('status', 'Data Berhasil dikirim');
    }

    public function showForm($lembaga_id)
    {
        $lembaga = Lembaga::find($lembaga_id);

        if (!$lembaga) {
            return redirect()->route('dashboard')->with('error', 'Lembaga tidak ditemukan.');
        }

        return view('input_form', ['lembaga' => $lembaga]);
    }

    public function showDataView($lembaga_id)
    {
        $lembaga = Lembaga::find($lembaga_id);
    
        if (!$lembaga) {
            return redirect()->route('dashboard')->with('error', 'Lembaga tidak ditemukan.');
        }
    
        $arsips = Arsip::where('lembaga_id', $lembaga_id)->get();
    
        return view('data_view', ['lembaga' => $lembaga, 'arsips' => $arsips]);
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $lembaga = Lembaga::all();
        return view('edit_data', compact('arsip', 'lembaga'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_klasifikasi' => 'required|string|max:255',
            'kurun_waktu' => 'required|date',
            'uraian_informasi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'jenis_arsip' => 'required|string',
            'retensi_aktif' => 'required|integer|min:1',
            'retensi_inaktif' => 'required|integer|min:1',
            'asli' => 'nullable|string',
            'tekstual' => 'nullable|string',
            'baik' => 'nullable|string',
            'keterangan_lain' => 'nullable|string'
        ]);

        $arsip = Arsip::findOrFail($id);

        $arsip->update([
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'kurun_waktu' => $request->kurun_waktu,
            'uraian_informasi' => $request->uraian_informasi,
            'jumlah' => $request->jumlah,
            'jenis_arsip' => $request->jenis_arsip,
            'retensi_aktif' => $request->retensi_aktif,
            'retensi_inaktif' => $request->retensi_inaktif,
            'kondisi_asli' => $request->has('asli') ? 'Asli' : null,
            'kondisi_tekstual' => $request->has('tekstual') ? 'Tekstual' : null,
            'kondisi_baik' => $request->has('baik') ? 'Kondisi arsip baik' : null,
            'keterangan_lain' => $request->input('keterangan_lain', null)
        ]);

        return redirect()->route('data_view')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->delete();

        return redirect('/data_view')->with('success', 'Data arsip berhasil dihapus.');
    }


    public function dataView(Request $request)
    {
        
        $lembagaId = $request->get('lembaga_id');
    
        $arsips = Arsip::query();
        $query = Arsip::query();

    
        if ($lembagaId) {
            $arsips->where('lembaga_id', $lembagaId);
        }
    
        $arsips = $arsips->paginate(10);
    
        // Menambahkan query string untuk paginasi
        $arsips->appends($request->query());
        
        $sortColumn = $request->input('sort', 'uraian_informasi'); // default column
        $sortDirection = $request->input('direction', 'asc'); // default direction
        $query->orderBy($sortColumn, $sortDirection);
    
        // Pastikan $lembagas didefinisikan jika diperlukan
        $lembagas = Lembaga::all();
    
        return view('data_view', [
            'arsips' => $arsips,
            'lembagas' => Lembaga::all(), // Sesuaikan dengan data lembaga
        ]);
    }
    
    public function history(Request $request)
    {
         // Ambil data lembaga dari database
         $lembagas = Lembaga::all();
    
         // Ambil data arsip berdasarkan lembaga_id dari query parameter
         $lembagaId = $request->query('lembaga_id');
         $query = Arsip::query();
     
         if ($lembagaId) {
             $query->where('lembaga_id', $lembagaId);
         }
     
         if ($search = $request->input('search')) {
             $column = $request->input('column', 'uraian_informasi'); // default to 'uraian_informasi'
             $query->where($column, 'like', "%{$search}%");
         }
     
         $sortColumn = $request->input('sort_column', 'uraian_informasi'); // default column
         $sortDirection = $request->input('sort_direction', 'asc'); // default direction
     
         $query->orderBy($sortColumn, $sortDirection);
     
         $arsips = $query->paginate(100)->appends($request->query());
     
         // Kirim data ke view
         return view('history', compact('lembagas', 'arsips'));
    }

}

