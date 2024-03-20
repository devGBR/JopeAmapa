<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TarefasController extends Controller
{
    public function index(Request $request){
        $islogger = true;
        $id = Auth::id();
        $user =  User::find($id);
        $users = 
        $cargos = explode("|",$user->cargo);
        return Inertia::render('Modulos/Tarefas', ['user' => $user,  'logger' => $islogger, "cargos" => $cargos]);
    }
    
    public function create(Request $request){
    
    }
    
    public function store(Request $request){
    
    }
    
    public function show(Request $request){
    
    }
    
    public function update(Request $request){
    
    }
    
    public function delete(Request $request){
    
    }
}
