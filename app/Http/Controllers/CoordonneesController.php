<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordonnees;

class CoordonneesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Coordonnees::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'idpays' => 'required|exists:pays,id',
            'telephone' => 'required|string|max:20',
            'email' => 'required|string|email|max:20|unique:coordonnees,email',
            'adresse' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'codepostal' => 'required|string|max:20',
        ]);

        $coordonnees = Coordonnees::create($validated);
        return response()->json($coordonnees, 201);
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
        $coordonnees = Coordonnees::find($id);
        if(!$coordonnees){
            return response()->json(['message' => 'Coordonnées non trouver'], 404);
        }
        return response()->json($coordonnees);
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
        $coordonnees = Coordonnees::find($id);

        if(!$coordonnees){
            return response()->json(['message' => 'pas de coordonnees'], 404);
        }
        $validated = $request->validate([
            'idpays' => 'sometimes |required | exists:pays, id',
            'telephone' => 'sometimes | required | string |max:20',
            'email' => 'sometimes | required | string | email | max:20 | unique:coordonnees, email',
            'adresse' => 'sometimes | required | string | max:100',
            'ville' => 'sometimes | required | string | max:100',
            'codepostal' => 'sometimes | required | string | max:20',
        ]);
        $coordonnees->update($validated);
        return response()->json($coordonnees);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
