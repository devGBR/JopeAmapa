<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskUsersResource;
use App\Models\Jopers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TarefasController extends Controller
{
    public function index(Request $request)
    {
        $islogger = true;
        $id = Auth::id();
        $user =  User::find($id);
        $dados = Jopers::where('user_id', $id)->first();
        $lider = explode("|", $dados->lider_ministerio);
        $cargos = explode("|", $user->cargo);

        if ($lider[0] != "") {
            $users = TaskUsersResource::collection(User::where(function ($query) use ($lider) {
                foreach ($lider as $cargo) {
                    $query->orWhere('cargo', 'like', '%' . $cargo . '%');
                }
            })->get());
            return Inertia::render('Modulos/Tarefas', ['user' => $user, 'users' => $users, 'logger' => $islogger, "cargos" => $cargos,  'lideranca' => $lider]);
        }

        return Inertia::render('Modulos/Tarefas', ['user' => $user,  'logger' => $islogger, "cargos" => $cargos]);
    }

    public function store(Request $request)
    {
        try {
            $login = ValidToken($request->token);
            if ($login) {
                $user = User::where('token_api', $request->token)->first();
                $dados = Jopers::where('user_id', $user->id)->first();
                $permissao = explode("|", $dados->lider_ministerio);
                if ($permissao[0] != "" || $permissao != null) {
                    $create = [
                        'tarefa' => $request->tarefa,
                        'descricao' => $request->descricao,
                        'user_id' => HashIdsDecode($request->responsavel),
                        'ministerio' => $request->ministerio,
                        'vencimento' => $request->vencimento,
                        'status' => $request->status,
                        'ids_equipe' => $request->ids_equipe
                    ];
                    dd($create);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                "mensagem" => $e->getMessage()
            ], 500);
        }
    }

    public function show(Request $request)
    {
    }

    public function update(Request $request)
    {
    }

    public function delete(Request $request)
    {
    }
}
