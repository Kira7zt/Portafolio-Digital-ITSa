<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class GeneroController extends Controller
{
    public function form()
    {
        return view('auth.completar-genero');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genero' => 'required|string|max:20',
        ]);

        $user = User::find(Auth::id());
        if (! $user) {
            return redirect('/login')->withErrors('Usuario no encontrado.');
        }
        $user->genero = $request->genero;
        $user->save();

        return redirect('/admin')->with('success', 'Género registrado correctamente.');
    }
}
