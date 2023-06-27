<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\StorePlatRequest;
use App\Http\Requests\UpdatePlatRequest;
use App\Models\Categorie;
use Illuminate\Support\Str;


class PlatController extends Controller
{

    public function index()
    {
        $plats = Plat::with('categorie')->paginate();

        return view('plats.index', compact('plats'));

    }


    public function create()
    {
        $categories = Categorie::all();
        return view('plats.create', compact('categories'));

    }


    public function store(StorePlatRequest $request)
    {
        $slug = Str::slug($request->input('libelle'));
        $image = $request->file('image');
            $imageName = null;
        if ($image) {
            $imageName = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/plats'), $imageName);
        }
        Plat::create(array_merge($request->validated(), ['slug' => $slug,  'image' => 'images/plats/' . $imageName]));
        return redirect()->route('plats.index')->with('success', 'Plat créé avec succès');

    }


    public function show(Plat $plat)
    {
        $plat->load('categorie');
        return view('plats.show', compact('plat'));

    }


    public function edit(Plat $plat)
    {
        $categories = Categorie::all();
        return view('plats.edit', compact('plat', 'categories'));

    }


    public function update(UpdatePlatRequest $request, Plat $plat)
    {
        if ($plat->libelle !== $request->input('libelle')) {
            $slug = Str::slug($request->input('libelle'));
        }
        if ($request->hasFile('image')) {
            unlink(public_path('images/plats/' . $plat->image));
            $image = $request->file('image');
            $imageName = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/plats'), $imageName);
        }

        $plat->update($request->validated(), ['slug' => $slug, 'image' => $imageName]);
        return redirect()->route('plats.index')->with('success', 'Plat mise à jour avec succès');
    }


    public function destroy(Plat $plat)
    {
        $plat->delete();
        return redirect()->route('plats.index')->with('success', 'Plat supprimée avec succès');
    }
}
