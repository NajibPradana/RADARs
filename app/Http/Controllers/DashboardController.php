<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                $lembagas = Lembaga::all();
                return view('dashboard', compact('lembagas'));
            } elseif ($usertype == 'admin') {
                $lembagas = Lembaga::all();
                return view('admin_dashboard', compact('lembagas'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function history()
    {
        return view('history');
    }

    public function destroy(Arsip $arsip)
    {
        $arsip->delete();
        return redirect()->route('data_view')->with('status', 'Data Berhasil dihapus');
    }

    public function data_admin(Request $request)
    {
        // Ambil data lembaga dari database
        $lembagas = Lembaga::all();

        // Ambil data arsip berdasarkan lembaga_id dari query parameter
        $lembagaId = $request->query('lembaga_id');
        $query = Arsip::query();

        if ($lembagaId) {
            $query->where('lembaga_id', $lembagaId);
        }

        // Searching functionality
        if ($search = $request->input('search')) {
            $column = $request->input('column', 'uraian_informasi'); // default to 'uraian_informasi'
            $query->where($column, 'like', "%{$search}%");
        }

        // Sorting functionality
        $sortColumn = $request->input('sort', 'uraian_informasi'); // default column
        $sortDirection = $request->input('direction', 'asc'); // default direction
        $query->orderBy($sortColumn, $sortDirection);

        $arsips = $query->paginate(100)->appends($request->query());

        // Kirim data ke view
        return view('data_admin', compact('lembagas', 'arsips'));
    }
}