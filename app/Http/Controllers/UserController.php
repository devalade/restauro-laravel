<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
        
    }

    public function update(Request $request, User $user)
    {

    }

    public function destroy()
    {

    }
}
