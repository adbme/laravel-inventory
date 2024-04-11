<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use Illuminate\Http\Request;

class MetierController extends Controller
{
    public function index()
    {
        $metier = Metier::all();
        return view('metier', compact('metier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:metier,nom'
        ]);

        Metier::create($request->only('nom'));

        return redirect()->route('metier.index')->with('success', 'Metier ajouté avec succès.');
    }
}
