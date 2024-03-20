<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventosResource;
use App\Models\Eventos;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EventosController extends Controller
{
    public function index()
    {
        $islogger = true;
        $id = Auth::id();
        $user =  User::find($id);
        $event = EventosResource::collection(Eventos::orderBy('data', 'asc')->get());
        $cargos = explode("|",$user->cargo);
        return Inertia::render('Modulos/Eventos', ['user' => $user,  'logger' => $islogger, 'events' => $event, "cargos" => $cargos]);
    }

    public function create(Request $request)
    {
        try {
            $id = Auth::id();
            $user = User::find($id);
            $cargos = explode("|", $user->cargo);
            if (count($cargos) > 1 && in_array("lider", $cargos) || in_array("mídia", $cargos)) {
                foreach ($request->file('banner') as $file) {
                    $file->storeAs('storage/eventos', $file->getClientOriginalName(), 'public');
                    $file = '/storage/eventos/' . $file->getClientOriginalName();
                }
                $date = new DateTime($request->data);
                $create = [
                    'evento' => $request->nome,
                    'data' => date_format($date, "Y-m-d"),
                    'horario' => $request->horario,
                    'descricao' => $request->descricao,
                    'banner' => $file
                ];
                $event = Eventos::create($create);
                if ($event->id) {
                    return Inertia::location('/events');
                }
            } else {
                throw new Exception("Usuário não tem permissão para criar um evento");
            }
        } catch (\Exception $e) {
            return response()->json([
                "mensagem" => $e->getMessage()
            ], 500);
        }
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
        try {
            $login = ValidToken($request->token);
            if ($login) {
                $id = HashIdsDecode($request->id);
                $event = Eventos::find($id);
                if ($event) {
                    if ($event->delete()) {
                        return response()->json([
                            "mensagem" => "Evento deletado"
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
}
