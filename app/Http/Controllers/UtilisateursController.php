<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Utilisateur::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'prenom'=> 'required|string|max:200',
            'nom'=> 'required|string|max:255',
            'sexe'=> 'required|string|max:100',
            'adresse'=> 'required|string|max:20',
            'ville'=> 'required|string|max:100',
            'pays'=> 'required|string|max:100',
            'telephone'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:100|unique:utilisateurs,email',
        ]);

        $utilisateur = Utilisateur::create($validated);
        return response()->json($utilisateur, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // On peut rediriger vers create pour éviter la duplication
        return $this->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        return response()->json($utilisateur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        return response()->json($utilisateur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $validated = $request->validate([
            'prenom'=> 'sometimes|required|string|max:200',
            'nom'=> 'sometimes|required|string|max:255',
            'sexe'=> 'sometimes|required|string|max:100',
            'adresse'=> 'sometimes|required|string|max:20',
            'ville'=> 'sometimes|required|string|max:100',
            'pays'=> 'sometimes|required|string|max:100',
            'telephone'=> 'sometimes|required|string|max:100',
            'email'=> 'sometimes|required|string|email|max:100|unique:utilisateurs,email,'.$id,
        ]);

        $utilisateur->update($validated);
        return response()->json($utilisateur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
