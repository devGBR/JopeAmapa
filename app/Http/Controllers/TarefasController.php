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
        if (!empty($lider)) {
            $users = TaskUsersResource::collection(User::where(function ($query) use ($lider) {
                foreach ($lider as $cargo) {
                    $query->orWhere('cargo', 'like', '%' . $cargo . '%');
                }
            })->get());
            return Inertia::render('Modulos/Tarefas', ['user' => $user, 'users' => $users, 'logger' => $islogger, "cargos" => $cargos]);
        }

        return Inertia::render('Modulos/Tarefas', ['user' => $user,  'logger' => $islogger, "cargos" => $cargos]);
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
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
