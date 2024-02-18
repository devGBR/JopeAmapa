<?php

namespace App\Http\Controllers;

use App\Models\Jopers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'username'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'Error' => 'Usuário não encontrado',
        ]);
    }

    public function register(Request $request)
    {
        $validate =  $request->validate([
            'nome' => 'required|string',
            'username' => 'required|string',
            'data_nascimento' => 'required|string',
            'genero' => 'required|string',
            'endereco' => 'required|string',
            'bairro' => 'required|string',
            'numero' => 'required|string',
            'password' => 'required',
            'convertido' => 'required|string',
            'ministerio' => 'required|string',
            'batizado' => 'required|boolean',
            'celula' => 'required|string',
        ]);
        if ($validate) {
            $user = User::create([
                'nome' => $request->nome,
                'username' => $request->username,
                'data_nascimento' => $request->data_nascimento,
                'genero' => $request->genero,
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'numero' => $request->numero,
                'password' => bcrypt($request->password),
            ]);
            $joper = Jopers::create([
                'user_id' => $user->id,
                'convertido' => $request->convertido,
                'ministerio'  => $request->ministerio,
                'batizado'  => $request->batizado,
                'celula'  => $request->celula,
            ]);
            if($user && $joper){
                return response()->json([
                    'menssage' => 'cadastrado com suceeso'
                ], 200);
            }
            
        }else{
            return back()->withErrors([
                'Error' => 'Preencha todos os dados antes de continuar',
            ]);
        }
    }
}
