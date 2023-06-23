<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\SendUserPasswordNotification;
use Database\Seeders\PermissionAndRoleSeeder;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        Gate::allowIf(Auth::user()->hasRole('admin'));
        $users = User::where('created_by', Auth::user()->id)->paginate();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
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
        ]);

    // Création d'un nouvel utilisateur avec les données validées
        $password = Str::password(12);
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => Hash::make($password),
            'created_by' => Auth::user()->id
        ]);

        $user->assignRole(['serveur', 'client']);
        \Illuminate\Support\Facades\Notification::send($user, new SendUserPasswordNotification($user,$password));

        return redirect()->route('users.index')->with('success', 'L\'utilisateur a été créé avec succès.');
}


    public function edit(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('users.edit', [
            'user' => $user,
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
        $user->delete();
        return redirect()->route('users.index');
    }
}
