<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();
        return view('riwayat.index', compact('riwayat'));
    }

    public function create()
    {
        return view('riwayat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'arsip_id' => 'required',
            'user_id' => 'required',
            'aksi' => 'required',
            'keterangan' => 'nullable',
        ]);

        Riwayat::create($request->all());
        return redirect()->route('riwayat.index');
    }

    public function show(Riwayat $riwayat)
    {
        return view('riwayat.show', compact('riwayat'));
    }

    public function edit(Riwayat $riwayat)
    {
        return view('riwayat.edit', compact('riwayat'));
    }

    public function update(Request $request, Riwayat $riwayat)
    {
        $request->validate([
            'arsip_id' => 'required',
            'user_id' => 'required',
            'aksi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $riwayat->update($request->all());
        return redirect()->route('riwayat.index');
    }

    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('riwayat.index');
    }
}

