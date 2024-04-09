<?php

namespace App\Http\Controllers;

use App\Models\Jopers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'menssage' => 'Logado suceeso'
            ], 200);
        }

        return response()->json([
            'error' => 'Usuário não encontrado'
        ], 400);
    }
    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
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
            'ministerio' => 'required',
            'batizado' => 'required|boolean',
            'celula' => 'required|string',
        ]);
        if ($validate) {
            $token = base64_encode($request->username .":". $request->password);
            $interesse = implode(" | ", $request->ministerio);
            $user = User::create([
                'nome' => $request->nome,
                'username' => $request->username,
                'data_nascimento' => $request->data_nascimento,
                'genero' => $request->genero,
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'cargo' => 'joper',
                'numero' => $request->numero,
                'token_api' => $token,
                'password' => bcrypt($request->password),
            ]);
            $joper = Jopers::create([
                'user_id' => $user->id,
                'convertido' => $request->convertido,
                'ministerio'  => $interesse,
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
