<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientele;

class ClienteleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Clientele::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'idpersonne' => 'required|exists:personnes,id',
            'idcoordonnees' => 'required|exists:coordonnees,id',
            'secteuractivite' => 'required|string|max:100',
            'typeclient' => 'required|string|max:100',
        ]);
        $clientele = Clientele::create($validated);
        return response()->json($clientele, 201);
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
        $clientele = Clientele::find($id);
        if(!$clientele){
            return response()->json(['message' => 'client non trouver'], 404);
        }
        return response()->json($clientele);
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
