<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $id = Auth::id();
        if($id){
            $islogger = true;
            $user =  User::find($id);
            return Inertia::render('Home',['user' => $user, 'logger' => $islogger]);
            
        }else{
            $islogger = false;
            return Inertia::render('Home',['logger' => $islogger]);
            
        }
    }
}
