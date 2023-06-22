<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\PermissionAndRoleSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }


    public function create()
    {
        $roles = PermissionAndRoleSeeder::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|array'
        ]);

    // Création d'un nouvel utilisateur avec les données validées
        $user = new User();
        $user->nom = $validatedData['nom'];
        $user->prenom = $validatedData['prenom'];
        $user->sexe = $validatedData['sexe'];
        $user->contact = $validatedData['contact'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        $user->roles()->sync($validatedData['roles']);

        return redirect()->route('users.index')->with('success', 'L\'utilisateur a été créé avec succès.');
}


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);

    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->sexe = $request->sexe;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
