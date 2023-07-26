<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O email não é válido!',
            'password.required' => 'O campo senha é obrigatório!',
        ]);

        if(Auth::attempt($credenciais)){
            if(Auth::user()->tipo_acesso == 'Cliente'){
                $request->session()->regenerate();
                return redirect()->intended('/create');
            }else if(Auth::user()->tipo_acesso == 'Colaborador' && Auth::user()->dpto == 'T.I'){
                $request->session()->regenerate();
                return redirect()->intended('/chamados/ti');
            }else if(Auth::user()->tipo_acesso == 'Colaborador' && Auth::user()->dpto == 'Compliance'){
                $request->session()->regenerate();
                return redirect()->intended('/chamados/compliance');
            }
        }else{
            return redirect()->back()->with('danger', 'Email ou senha inválidos.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
