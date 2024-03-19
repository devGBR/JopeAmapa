<?php

namespace App\Http\Controllers;

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
        return Inertia::render('Modulos/Eventos', ['user' => $user,  'logger' => $islogger,]);
    }

    public function create(Request $request)
    {
        try{
                $id = Auth::id();
                $user = User::find($id);
                $cargos = explode("|", $user->cargo);
                if (count($cargos) > 1 && in_array("Lider", $cargos) || in_array("Midia", $cargos)) {
                    foreach ($request->file('banner') as $file) {
                        $storage = $file->store('storage/eventos', 'public');
                        // Aqui você pode fazer qualquer coisa com o $storagePath, como armazená-lo em um banco de dados, por exemplo.
                    }
                    $file = Storage::path($storage);
                    $date = new DateTime($request->data);
                    $create = [
                        'evento' => $request->nome,
                        'data' => date_format($date, "Y-m-d"),
                        'horario' => $request->horario,
                        'descricao' => $request->descricao,
                        'banner' => $file
                    ];
                    $event = Eventos::create($create);
                    if($event->id){
                        return response()->json([
                            "mensagem" => "Evento cadastrado com sucesso!"
                        ], 200);
                    }   
                }else{
                    throw new Exception("Usuário não tem permissão para criar um evento");
                }
           
        }catch(\Exception $e){
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
    }
}