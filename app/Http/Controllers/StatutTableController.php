<?php

namespace App\Http\Controllers;

use App\Models\Statut_Table;
use App\Http\Requests\StoreStatut_TableRequest;
use App\Http\Requests\UpdateStatut_TableRequest;

class StatutTableController extends Controller
{
    
    public function index()
    {
        $statutTables = Statut_Table::all();
        return view('statut_table.index', compact('statutTables'));
    }


    public function create()
    {
        return view('statut_tables.create');
    }

    
    public function store(StoreStatut_TableRequest $request)
    {
        $statut_table = new Statut_Table;
        $statut_table->libelle = $request->libelle;
        $statut_table->created_by = auth()->user()->id;
        $statut_table->save();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table créé avec succès');
    
    }

    
    public function show(Statut_Table $statut_Table)
    {
        return view('statut_tables.show', compact('statut_table'));
    }

    
    public function edit(Statut_Table $statut_Table)
    {
        return view('statut_tables.edit', compact('statut_Table'));

    }

    
    public function update(UpdateStatut_TableRequest $request, Statut_Table $statut_Table)
    {
        $statut_Table->libelle = $request->libelle;
        $statut_Table->save();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table mis à jour avec succès');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statut_Table $statut_Table)
    {
        $statut_Table->delete();

        return redirect()->route('statut_tables.index')->with('success', 'Statut de table supprimée avec succès');
    
    }
}
