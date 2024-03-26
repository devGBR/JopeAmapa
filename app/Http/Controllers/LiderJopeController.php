<?php

namespace App\Http\Controllers;

use App\Models\Jopers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LiderJopeController extends Controller
{
    public function index(){
        $user = getUser();
        if($user){
            $cargos = explode("|", $user->cargo);
            if(count($cargos) > 1 && in_array("lider", $cargos)){
                $islogger = true;
                $dadosJopers = Jopers::all();
                $users = User::all();
                return Inertia::render('Modulos/Dashboard', ['user' => $user,  'logger' => $islogger,  "cargos" => $cargos, 'dados' => $dadosJopers, 'users' => $users]);
            }
        }
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
