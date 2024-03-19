<?php

use Illuminate\Support\Facades\Auth;

function ValidToken($token){
    $dados = explode(":",base64_decode($token));
    $credentials = [
        "username" => $dados[0],
        "password" => $dados[1]
    ];
    if(Auth::attempt($credentials)){
        return true;
    }else{
        return false;
    }
}