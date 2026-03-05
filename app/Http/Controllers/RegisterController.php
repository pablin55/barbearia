<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostra o formulário de registro
    public function create()
    {
        return view('register');
    }

    // Processa o formulário de registro
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Cria o usuário
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Loga automaticamente o usuário
        Auth::login($user);

        // Redireciona para home
        return redirect()->route('home')->with('success', 'Conta criada com sucesso!');
    }
}