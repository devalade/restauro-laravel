<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\StatutTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use Illuminate\Support\Facades\Storage;


class TableController extends Controller
{

    public function index()
    {
        //$tables = Table::paginate();
        $tables = Table::with('statut_table')->paginate();

        return view('tables.index', compact('tables'));
    }


    public function create()
    {

        $status = StatutTable::all();
        return view('tables.create', compact('status'));
    }


    public function store(StoreTableRequest $request)
    {
        Table::create(array_merge($request->validated()));
        return redirect()->route('tables.index')->with('success', 'Table créé avec succès');
    }

    
    public function show(Table $table)
    {
        $table->load('statut_table');
        return view('tables.show', compact('table'));
    }


    public function edit(Table $table)
    {
        $status = StatutTable::all();
        return view('tables.edit', compact('table', 'status'));
    }


    public function update(UpdateTableRequest $request, Table $table)
    {
        $table->update($request->validated());
        return redirect()->route('tables.index')->with('success', 'Table mise à jour avec succès');

    }


    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Table supprimée avec succès');

    }
}
