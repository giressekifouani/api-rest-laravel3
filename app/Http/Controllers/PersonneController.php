<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personne;
class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(personne::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            // 'idcoordonnees'  => 'required|exists:coordonnees,idcoordonnes',
            'prenom'  => 'required|string|max:255',
            'nom'  => 'required|string|max:255',
            'sexe' => 'required|string|max:15',
            'datenaissance'  => 'required|date',
            'lieunaissance'  => 'required|string|max:100',
            'numeropiece'  => 'required|string|max:100|unique:personne,numeropiece',
        ]);

        $personne = Personne::create($validated);
        return response()->json($personne, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(['message' => 'Personne non trouver'], 404);
        }
        return response()->json($personne);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(['message'  => 'Personne non trouver']);
        }
        $validated = $request->validate([
            'prenom'  => 'sometimes|required|string|max:255',
            'nom'  => 'sometimes|required|string|max:255',
            'sexe'  => 'sometimes|required|string|max:15',
            'datenaissance' => 'sometimes|required|date',
            'lieunaissance'  => 'sometimes|required|string|max:100',
        ]);
        $personne = Personne::update($validated);
        return response()->json($personne);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(['message' => 'Personne non trouver'], 404);
        }

        $personne->delete();
        return response()->json(['message' => 'Personne supprimer'], 201);
    }
}
