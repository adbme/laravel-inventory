<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
{
    $materials = Material::all();
    return view('dashboard', ['materials' => $materials]);
}


    public function store(Request $request)
    {
        Material::create([
            'type' => $request->input('type'),
            'numero' => $request->input('numero'),
            'assigne_a' => $request->input('assigne'),
            'metier' => $request->input('metier'),
            'marque' => $request->input('marque'),
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy($id)
{
    $material = Material::findOrFail($id);
    $material->delete();
    return redirect()->route('dashboard');
}



}
