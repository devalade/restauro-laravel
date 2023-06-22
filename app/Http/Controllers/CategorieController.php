<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    public function __construct(){
    }


    public function index()
    {
        $categories = Categorie::query()->where('created_by', Auth::user()->id)->paginate();

        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategorieRequest $request)
    {

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Générer un slug à partir du libellé de la catégorie
        $slug = Str::slug($request->input('libelle'));

        // Récupérer les données validées et ajouter l'utilisateur connecté et le slug
        $validatedData = $request->validated();
        $validatedData['created_by'] = $user->id;
        $validatedData['slug'] = $slug;

        // Créer une nouvelle catégorie avec les données validées
        $categorie = Categorie::create($validatedData);

        // Rediriger vers la page de la nouvelle catégorie avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');

    }


    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {


        // Générer un nouveau slug à partir du nouveau libellé de la catégorie (s'il a changé)
        $slug = $categorie->slug;
        if ($categorie->libelle !== $request->input('libelle')) {
            $slug = Str::slug($request->input('libelle'));
        }

        // Mettre à jour les données de la catégorie avec les données validées
        $categorie->update(array_merge(
            $request->validated(),
            ['slug' => $slug]
        ));

        // Rediriger vers la page de la catégorie modifiée avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succès.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return Redirect::back()->with('succes', 'Catégorie supprimée avec succès.');
    }
}
