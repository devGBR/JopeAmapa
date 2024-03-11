<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerseDay;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        if ($id) {
            $islogger = true;
            $user =  User::find($id);
            $verse_day = VerseDay::first();
            
            if ($verse_day === null || date_format($verse_day->created_at, 'Y-m-d') < date('Y-m-d')) {
                if ($verse_day != null) $verse_day->delete();
                $http = new Client();
                $response = $http->get('https://www.abibliadigital.com.br/api/verses/nvi/random');
                $data = json_decode($response->getBody()->getContents());
               
                $create = [
                    'livro' => $data->book->name,
                    'author'  => $data->book->author ,
                    'group'  => $data->book->group,
                    'captulo'  => $data->chapter,
                    'versiculo' => $data->number ,
                    'text' => $data->text
                ];
                 $newVerse = VerseDay::create($create);
                 $verse_day = VerseDay::find($newVerse->id);
            }

            return Inertia::render('HomeAuth', ['user' => $user, 'logger' => $islogger, ]);
        } else {
            $islogger = false;
            return Inertia::render('Home', ['logger' => $islogger]);
        }
    }
}
