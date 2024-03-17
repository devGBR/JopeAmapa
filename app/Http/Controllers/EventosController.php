<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $id = Auth::id();
        $user = User::find($id);
        $cargos = explode("|", $user->cargo);
        if (count($cargos) > 1 && in_array("Lider", $cargos) || in_array("Midia", $cargos)) {
            $storage = $request->file('evento')->store('eventos', 'public');
            $file = Storage::path($storage);
            
            $create = [
                'evento' => $request->nome,
                'data' => date_format($request->data, "Y-m-d"),
                'horario' => $request->horario,
                'descricao' => $request->descricao,
                'banner' => $file
            ];
            dd($create);
            
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
