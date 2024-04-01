<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Http\Resources\UsersResource;
use App\Models\Jopers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LiderJopeController extends Controller
{
    public function index()
    {
        $user = getUser();
        if ($user) {
            $cargos = explode("|", $user->cargo);
            if (count($cargos) > 1 && in_array("lider", $cargos)) {
                $islogger = true;
                $dadosJopers = DataResource::collection(Jopers::all());
                $users = UsersResource::collection(User::all());
                return Inertia::render('Modulos/Dashboard', ['user' => $user,  'logger' => $islogger,  "cargos" => $cargos, 'dados' => $dadosJopers, 'users' => $users]);
            }
        }
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
        try {
            $user = ValidToken($request->token);
            if ($user) {
                $cargos = explode("|", $user->cargo);
                if (count($cargos) > 1 && in_array("lider", $cargos)) {
                    if ($request->user) {
                        $updateUser = [
                            'endereco' => $request->endereco,
                            'bairro' => $request->bairro,
                            'numero' => $request->numero,
                            'cargo' =>  implode("|", $request->ministerio),
                        ];
                        $updateData = [
                            'convertido' => $request->convertido ?? "Não converido",
                            'batizado'  => $request->batizado,
                            'celula'  => $request->celula,
                            'lider_ministerio' => is_array($request->lideranca) ? implode("|", $request->lideranca) : null
                        ];
                        if ($updateUser && $updateData) {
                            $joper = User::find(HashIdsDecode($request->user));
                            $joper->update($updateUser);
                            $data = Jopers::where('user_id', $joper->id)->first();
                            $data->update($updateData);
                            return response()->json([
                                "mensagem" => "Usuário atualizado"
                            ], 200);
                        } else {
                            throw new Exception("Dados incompleto");
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                "mensagem" => $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = ValidToken($request->token);
            if ($user) {
                $cargos = explode("|", $user->cargo);
                if (count($cargos) > 1 && in_array("lider", $cargos)) {
                    if ($request->id) {
                        $joper = User::find(HashIdsDecode($request->id));
                        $data = Jopers::where('user_id', $joper->id)->first();
                        $data->delete();
                        $joper->delete();
                        return response()->json([
                            "mensagem" => "Usuário atualizado"
                        ], 200);
                    } else {
                        throw new Exception("Dados incompleto");
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                "mensagem" => $e->getMessage()
            ], 500);
        }
    }
}
