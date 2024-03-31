<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

function ValidToken($token){
    $dados = explode(":",base64_decode($token));
    $credentials = [
        "username" => $dados[0],
        "password" => $dados[1]
    ];
    if(Auth::attempt($credentials)){
        return User::where('token_api', $token)->first();
    }else{
        return false;
    }
}

function HashIdsEncode($id){
    return Hashids::encode($id);
}
function HashIdsDecode($hash){
    return (string) Hashids::decode($hash)[0];
}

function getUser(){
    $id = Auth::id();
    return User::find($id);
}