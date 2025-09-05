<?php

namespace App\Http\Controllers;
use App\Models\utilisateur;

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
            'prenom'=> 'required | string | max:200',
            'nom'=> 'required | string | max:255',
            'sexe'=> 'required |string | max:100',
            'adresse'=> 'required |string |max:20',
            'ville'=> 'required |string|max:100',
            'pays'=> 'required |string|max:100',
            'telephone'=> 'required |string|max:100',
            'email'=> 'required |string|max:100',
        ]);
        $services = Utilisateur::create($validated);
        return response()->json($services, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prenom'=> 'required | string | max:200',
            'nom'=> 'required | string | max:255',
            'sexe'=> 'required |string | max:100',
            'adresse'=> 'required |string |max:20',
            'ville'=> 'required |string|max:100',
            'pays'=> 'required |string|max:100',
            'telephone'=> 'required |string|max:100',
            'email'=> 'required |string|max:100',
        ]);
        $services = Utilisateur::create($validated);
        return response()->json($services, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
