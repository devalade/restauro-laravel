<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\StatutTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;


class TableController extends Controller
{
    
    public function index()
    {
        //$tables = Table::paginate();
        //$tables = Table::with('statut_table')->get();
        $tables = Table::join('statut_tables', 'tables.statut_table_id', '=', 'statut_tables.id')->select('tables.*', 'statut_tables.libelle')->paginate();

        return view('tables.index', compact('tables'));

    }


    public function create()
    {
    
        $status = StatutTable::all();
        return view('tables.create', compact('status'));
    }

    
    public function store(StoreTableRequest $request)
    {
        $table = new Table;
        $table->numero_table = $request->numero_table;
        $table->capacite = $request->capacite;
        $table->statut_table_id = $request->statut_table_id;
        $table->created_by = auth()->user()->id;
        $table->save();

        return redirect()->route('tables.index')->with('success', 'Table créé avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        $table->load('statut_table');
        return view('tables.show', compact('table'));
    }

    
    public function edit(Table $table)
    {
        $table->load('statut_table');
        return view('tables.edit', compact('table'));
    }

   
    public function update(UpdateTableRequest $request, Table $table)
    {
        $table->numero_table = $request->numero_table;
        $table->capacite = $request->capacite;
        $table->save();

        return redirect()->route('tables.index')->with('success', 'Table mise à jour avec succès');
    
    }


    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Table supprimée avec succès');
    
    }
}
