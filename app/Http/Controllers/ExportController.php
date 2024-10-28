<?php

namespace App\Http\Controllers;

use App\Exports\ArsipExport;
use App\Models\Arsip; // Pastikan Anda mengimpor model Arsip
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Mengunduh file Excel berdasarkan lembaga ID.
     *
     * @param  int  $lembagaId
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export($lembagaId)
    {
        return Excel::download(new ArsipExport($lembagaId), 'arsip_download.xlsx');
    }

    /**
     * Menampilkan preview data berdasarkan ID arsip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function preview($id)
    {
        $arsip = Arsip::find($id);

        return view('preview', compact('arsips'));
    }

    public function showArsip($lembaga_id)
{
    $arsips = Arsip::where('lembaga_id', $lembaga_id)->get();
    return view('arsip.show', compact('arsips'));
}

}
