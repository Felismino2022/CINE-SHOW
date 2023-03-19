<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\DB;

use App\Models\Cinema;
use App\Models\Provincia;
use App\Models\Sala;
use App\Models\Lugar;
use App\Models\Cidade;
use App\Models\Filme;
use App\Models\Seccao;
use App\Models\Reserva;
use App\Models\Client;

class AdminController extends Controller
{
    public function index(){

        //todos os filmes que têm uma sessao e que foram reservado
        $filmes = DB::table('filmes')
        ->whereExists(function ($query){
            //recupera o id do filme pela url 
            $query->select(DB::raw('*'))
            ->from('seccaos')
            ->join('reservas', 'seccaos.id', '=', 'reservas.seccao_id')
            ->whereColumn('filmes.id', '=', 'seccaos.filme_id') ;
         })
        ->get();

       // dd($filmes);

        //todas as quantidades de filme, agrupados por id
        $qtd_filmes = Seccao::select([
           DB::raw('seccaos.filme_id'), 
           DB::raw('COUNT(*) as total') ])
        ->join('reservas', 'seccaos.id', '=', 'reservas.seccao_id')
        ->groupBy('seccaos.filme_id')
        ->orderBy('seccaos.filme_id')
        ->get();
        

        $film = [];
        $qtd_filme = [];
        foreach($qtd_filmes as $filme){
            $qtd_filme[] = $filme['total'];
        }
        foreach($filmes as $key => $filme){
            $film[$key] = $filme->titulo;
        }
        //$filmm = ;
 
       // dd($film);

        return view('Admin.welcome', compact('film', 'qtd_filme'));
    }

    public function getCinema(){

        $cinemas = Cinema::all();
        $provincias = Provincia::all();
         
        return view('Admin.cinema', ['cinemas' => $cinemas, 'provincias' => $provincias]);
    }

    public function store(Request $request){

        $cinema = new Cinema;
        $cinema->nome = $request->nome_cinema;
        $cinema->cidade_id = $request->cid;
        $cinema->estado = 'activo';
        $cinema->user_id = '1';
        $cinema->save();

        return redirect('/cinema');
    }

    public function setSala(Request $request){

        $sala = new Sala;
        $sala->nome = $request->nome_sala;
        $sala->capacidade = $request->capacidade;
        $sala->cinema_id = $request->cinema;
        $sala->estado = 'activo';
        $sala->user_id = '1';
        $sala->save();
        return redirect('/sala');
    }
    public function setLugar(Request $request){

        $lugar = new Lugar;
        $lugar->nome = $request->nome_lugar;
        $lugar->sala_id = $request->sala;
        $lugar->estado = 'activo';
        $lugar->user_id = '1';
        $lugar->save();

        return redirect('/lugar');
    }

    public function loadCidade(){
        
        $provincia_id = request('provincia_id');
    
        $cidades = Cidade::where('provincia_id', '=', $provincia_id)->get();

        //return Response::json();
        return response()->json($cidades);
    }

    public function deletar($id){
        Cinema::findOrfail($id)->delete();
        
        return redirect('/cinema');
    }
    
    public function getSala(){

        $salas = Sala::all();
        $cinemas = Cinema::all();
        return view('Admin.sala',['salas' => $salas, 'cinemas' => $cinemas]);
    }

    public function getLugar(){

        $lugares = Lugar::all();
        $salas = Sala::all();

        return view('Admin.lugar', ['lugares' => $lugares, 'salas' => $salas]);
    }

    public function getFilme(){

        $filmes = Filme::all();

        return view('Admin.filme', ['filmes' => $filmes]);
    }

    public function getReserva(){

        $reservas = Reserva::all();

        return view('Admin.reserva', ['reservas' => $reservas]);
    }

    public function setFilme(Request $request){

        $filme = new Filme;
        $filme->titulo = $request->nome_filme;
        $filme->actor = $request->actor;
        $filme->duracao = $request->duracao;
        $filme->estado = 'activo';
        $filme->user_id = '1';
        $filme->descricao = $request->descricao;
        $filme->data_lancamento = $request->data_lancamento;

        //image Upload
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now") . $extension);

            $requestImagem->move(public_path('img/uploadImagem'), $imageName);

            $filme->imagem = $imageName;
        }

        //trailer
        if($request->hasFile('trailer') && $request->file('trailer')->isValid()){

            $requestImagem = $request->trailer;

            $extension = $requestImagem->extension();

            $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now") . $extension);

            $requestImagem->move(public_path('img/uploadImagem'), $imageName);

            $filme->trailer = $imageName;
        }

        $filme->save();

        return redirect('/filme');
    }

    public function getSessao(){

        $sessoes = Seccao::all();
        $filmes = Filme::all();
        $salas = Sala::all();

        return view('Admin.sessao', ['sessoes' => $sessoes, 'salas' => $salas, 'filmes' => $filmes]);
    }
    public function setSeccao(Request $request){

        $seccao = new Seccao;
        $seccao->preco = $request->preco;
        $seccao->filme_id = $request->filme;
        $seccao->sala_id = $request->sala;
        $seccao->estado = 'activo';
        $seccao->user_id = '1';

        $seccao->save();

        return redirect('/sessao');
    }
}
