<?php

namespace App\Http\Controllers;
use App\Models\Type;
use App\Models\Metier;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
{
    $materials = Material::all();
    $types = Type::all();
    $metiers = Metier::all();
    
    return view('dashboard', ['materials' => $materials, 'types'=> $types, 'metiers'=>$metiers]);
}


public function store(Request $request)
{
    $materials = Material::all();
    $types = Type::all();
    $metiers = Metier::all();

    $typeId = $request->input('type');
    $numero = $request->input('numero');
    $assigne = $request->input('assigne');
    $metierId = $request->input('metier');
    $marque = $request->input('marque');

    Material::create([
        'type_id' => $typeId,
        'numero' => $numero,
        'assigne_a' => $assigne,
        'metier_id' => $metierId,
        'marque' => $marque,
    ]);

   
    return view('add', ['materials' => $materials,'types' => $types, 'metiers'=>$metiers]);
}


    public function destroy($id)
{
    $material = Material::findOrFail($id);
    $material->delete();
    return redirect()->route('dashboard');
}


public function update(Request $request, $id)
{
    $material = Material::findOrFail($id);

    $typeId = $request->input('type');
    $numero = $request->input('numero');
    $assigne = $request->input('assigne');
    $metierId = $request->input('metier');
    $marque = $request->input('marque');

    $material->type_id = $typeId;
    $material->numero = $numero;
    $material->assigne_a = $assigne;
    $material->metier_id = $metierId;
    $material->marque = $marque;

    $material->update();

    return redirect()->back()->with('status', 'Matériel bien mis à jour');
}



}
