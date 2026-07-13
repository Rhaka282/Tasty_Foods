<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->withErrors(['error' => 'Anda tidak bisa mengubah peran Anda sendiri.']);
        }

        $newRole = $user->role === 'admin' ? 'user' : 'admin';
        $user->update(['role' => $newRole]);

        return redirect()->route('admin.users.index')->with('success', "Peran user {$user->name} berhasil diubah menjadi {$newRole}.");
    }

    public function toggleBlock(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->withErrors(['error' => 'Anda tidak bisa memblokir akun Anda sendiri.']);
        }

        $newBlockStatus = !$user->is_blocked;
        $user->update(['is_blocked' => $newBlockStatus]);

        $statusText = $newBlockStatus ? 'diblokir' : 'diaktifkan kembali';
        return redirect()->route('admin.users.index')->with('success', "Akun user {$user->name} berhasil {$statusText}.");
    }
}
