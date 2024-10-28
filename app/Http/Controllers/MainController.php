<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');
        // Implement your search logic here.
        // For demonstration, let's assume we return the same view with a query result.
        return view('search-results', compact('query'));
    }

    public function inputData(Request $request)
    {
        // Validate and process the input data.
        $request->validate([
            'data' => 'required|string|max:255',
        ]);

        // Assuming you have a model called DataModel
        // DataModel::create(['data' => $request->data]);

        return redirect()->back()->with('status', 'Data has been inputted successfully.');
    }

    public function lihatDaftar(Request $request)
    {
        // Retrieve the list of items from the database.
        // For demonstration, we will just return a view.
        // $items = DataModel::all();
        // return view('daftar', compact('items'));

        return view('daftar');
    }
}
