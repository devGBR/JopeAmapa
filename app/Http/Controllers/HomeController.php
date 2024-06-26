<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Tarefas;
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
            $verse_day = $this->verseDay();
            $event = Eventos::where('data' ,'>=' , date("Y-m-d") )->orderBy('data', 'asc')->first();
            $minhasTarefas = Tarefas::where('user_id', $id)->get();
            $tarefas = $minhasTarefas->merge(Tarefas::where('ids_equipe', 'like', '%' . HashIdsEncode($id) . '%')->get()) ?? null;
            $cargos = explode("|",$user->cargo);
            return Inertia::render('HomeAuth', ['user' => $user, 'logger' => $islogger, 'verse_day' => $verse_day,  'event' => $event,"cargos" => $cargos, "tarefas" => $tarefas]);
        } else {
            $islogger = false;
            $event = Eventos::orderBy('data', 'asc')->get();    
            return Inertia::render('Home', ['logger' => $islogger, 'events' => $event]);
        }
    }
    
    protected function verseDay(){
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
                'versiculo' => $data->number,
                'img' => rand(0, 7),
                'text' => $data->text
            ];
             $newVerse = VerseDay::create($create);
             return $verse_day = VerseDay::find($newVerse->id);
        }else{
            return $verse_day;
        }
    }
}
