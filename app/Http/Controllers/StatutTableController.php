<?php

namespace App\Http\Controllers;

use App\Models\StatutTable;
use App\Http\Requests\StoreStatutTableRequest;
use App\Http\Requests\UpdateStatutTableRequest;

class StatutTableController extends Controller
{

    public function index()
    {
        $statutTables = StatutTable::paginate();
        return view('statut_tables.index', compact('statutTables'));
    }


    public function create()
    {
        return view('statut_tables.create');
    }

    
    public function store(StoreStatutTableRequest $request)
    {
        $statutTable = new StatutTable();
        $statutTable->libelle = $request->libelle;
        $statutTable->created_by = auth()->user()->id;
        $statutTable->save();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table créé avec succès');
    
    }


    public function show(StatutTable $statutTable)
    {
        return view('statut_tables.show', compact('statutTable'));
    }


    public function edit(StatutTable $statutTable)
    {
        return view('statut_tables.edit', compact('statutTable'));
    }


    public function update(UpdateStatutTableRequest $request, StatutTable $statutTable)
    {
        $statutTable->libelle = $request->libelle;
        $statutTable->save();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table mis à jour avec succès');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatutTable $statutTable)
    {
        $statutTable->delete();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table supprimée avec succès');
    
    }
}
