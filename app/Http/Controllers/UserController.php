<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect()->route('users.index');
        }
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
        if (Gate::denies('delete-users')) {
            return redirect()->route('users.index');
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
