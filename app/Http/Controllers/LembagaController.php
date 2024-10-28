<?php
namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $lembaga = Lembaga::all();
        return view('dashboard', compact('lembaga'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
        ]);

        Lembaga::create([
            'nama_lembaga' => $request->input('nama_lembaga'),
        ]);

        return redirect()->route('dashboard')->with('status', 'Lembaga added successfully');
    }

    public function show(Lembaga $lembaga)
    {
        return view('lembaga.show', compact('lembaga'));
    }

    public function edit(Lembaga $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

   

    public function destroy($id)
{
    $lembaga = Lembaga::findOrFail($id);
    $lembaga->delete();

    // Redirect to the dashboard after deletion
    return redirect()->route('dashboard')->with('status', 'Lembaga deleted successfully');
}

}