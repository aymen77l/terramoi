<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private function checkAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs.');
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:client,gestionnaire,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Compte créé avec succès.');
    }

    public function destroy(User $user)
    {
        $this->checkAdmin();

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tu ne peux pas supprimer ton propre compte.');
        }

        $user->delete();
        return back()->with('success', 'Compte supprimé.');
    }
}
