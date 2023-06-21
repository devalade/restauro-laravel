<?php

namespace App\Http\Controllers;

use App\Models\Serveur;
use App\Http\Requests\StoreServeurRequest;
use App\Http\Requests\UpdateServeurRequest;

class ServeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serveurs = Serveur::paginate();
        return view('serveurs.index', compact('serveurs'));
    
    }


    public function create()
    {
        return view('serveurs.create');
    
    }

    
    public function store(StoreServeurRequest $request)
    {
        Serveur::create(array_merge($request->validated()));
        return redirect()->route('serveurs.index')->with('success', 'Serveur créé avec succès');
   
    }


    public function show(Serveur $serveur)
    {
        return view('serveurs.show', compact('serveur'));
    }

    
    public function edit(Serveur $serveur)
    {
        return view('serveurs.edit', compact('serveur'));

    }


    public function update(UpdateServeurRequest $request, Serveur $serveur)
    {
        $serveur->update($request->validated());
        return redirect()->route('serveurs.index')->with('success', 'Serveur mise à jour avec succès');

    }


    public function destroy(Serveur $serveur)
    {
        $serveur->delete();

        return redirect()->route('serveurs.index')->with('success', 'Serveur supprimée avec succès');

    
    }
}
