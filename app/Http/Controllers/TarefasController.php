<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskUsersResource;
use App\Models\Jopers;
use App\Models\Tarefas;
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
        $my_tarefas = Tarefas::where("user_id", $id)->get();
        $tasks = [];
        $usersTasks = [];
        $usersTasksresp = [];
        $userstaskresp = [];

        

        $group_tarefas = Tarefas::where(function ($query) use ($cargos) {
            foreach ($cargos as $cargo) {
                $query->orWhere('ministerio', 'like', '%' . $cargo . '%');
            }
        })->where('ids_equipe', 'like', '%' . HashIdsEncode($id) . '%')->get();
        if ($group_tarefas) {
            foreach ($group_tarefas as $task) {
                if ($task->ids_equipe) {
                    foreach (explode("|", $task->ids_equipe) as $id) {
                        $usertask = User::select("username", "nome", "cargo")->where('id', HashIdsDecode($id))->first();
                        $usersTasks[] = [
                            "username" => $usertask->username,
                            "nome" => $usertask->nome,
                            "cargos" => $usertask->cargo
                        ];
                    }
                    $tasks[$task->id] = $usersTasks;
                    $usersTasks = [];
                }
            }
        }
        if ($my_tarefas) {
            foreach ($my_tarefas as $task) {
                if ($task->ids_equipe) {
                    foreach (explode("|", $task->ids_equipe) as $id) {
                        $usertaskresp = User::select("username", "nome", "cargo")->where('id', HashIdsDecode($id))->first();
                        $usersTasksresp[] = [
                            "username" => $usertaskresp->username,
                            "nome" => $usertaskresp->nome,
                            "cargos" => $usertaskresp->cargo
                        ];
                    }
                    $userstaskresp[$task->id] = $usersTasksresp;
                    $usersTasksresp = [];
                }
            }
        }
        if ($lider[0] != "") {
            $users = TaskUsersResource::collection(User::where(function ($query) use ($lider) {
                foreach ($lider as $cargo) {
                    $query->orWhere('cargo', 'like', '%' . $cargo . '%');
                }
            })->get());
            return Inertia::render('Modulos/Tarefas', ['user' => $user, 'users' => $users, "userstaskgroup" => $tasks, 'userstaskresp' => $userstaskresp,'logger' => $islogger, "cargos" => $cargos, 'minhastarefas' => $my_tarefas, 'tarefasgrupo' => $group_tarefas, 'lideranca' => $lider]);
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
                        'ids_equipe' => implode("|", $request->ids_equipe)
                    ];
                    $task = Tarefas::create($create);
                    if ($task->id) {
                        return response()->json([
                            "mensagem" => "Tarefa criada com sucesso!"
                        ], 200);
                    }
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
