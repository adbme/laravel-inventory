<?php

namespace App\Http\Controllers;
use App\Models\Type;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
{
    $materials = Material::all();
    $types = Type::all();
    
    return view('dashboard', ['materials' => $materials, 'types' => $types]);
}


public function store(Request $request)
{
    $typeId = $request->input('type_id');
    $numero = $request->input('numero');
    $assigne = $request->input('assigne');
    $metier = $request->input('metier');
    $marque = $request->input('marque');

    Material::create([
        'type_id' => $typeId,
        'numero' => $numero,
        'assigne_a' => $assigne,
        'metier' => $metier,
        'marque' => $marque,
    ]);

    $materials = Material::all();

    $types = Type::all();
    return view('add', ['materials' => $materials,'types' => $types]);
}


    public function destroy($id)
{
    $material = Material::findOrFail($id);
    $material->delete();
    return redirect()->route('dashboard');
}



}
