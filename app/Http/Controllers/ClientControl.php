<?php

namespace App\Http\Controllers;

use App\Classes\Encri;
use App\Http\Controllers\Response;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use App\Http\Requests\ValidarUser;

use App\Models\Seccao;
use App\Models\Filme;
use App\Models\Cinema;
use App\Models\Sala; 
use App\Models\Lugar; 
use App\Models\Reserva; 

class ClientControl extends Controller
{
    private $Encri;

    public function __construct(){
        $this->Encri = new Encri();
    }

    public function user(Request $request, $lugares, $id_sec){
        /*$id, $idl=null*/
        $lugares = $this->Encri->desencriptar($lugares);
        $id_sec = $this->Encri->desencriptar($id_sec);

        json_decode($lugares);
        //dd($lugares);
        $lugares = explode(",", $lugares);
        $request->session()->put(['lugares' => $lugares]);
      /*  if($idl){
            $lugares = $id .''.$idl;
            $lugares = explode('&', $lugares) ;
        }else{
            $lugares[0] = $id;
        }  */ 

        return view('Cliente.user', ['lugares' => $lugares, 'id_sec' => $id_sec]);
    }

    public function sucess(ValidarUser $request){

        $id_sessao = $request->seccao_id;
        $sessao_unica = Seccao::findOrfail($id_sessao);
        $sala = Sala::findOrfail($sessao_unica->sala_id);
        $nome = $request->nome;
        $numero = $request->numero;
        $lugares = $request->session()->get('lugares');    

        return view('Cliente.sucess', ['sessao_unica' =>$sessao_unica, 'lugares' => $lugares, 'nome' =>$nome, 'numero' => $numero, 'sala' => $sala]);
    }

    public function gerarPdf(Request $request){

        $reserva = new Reserva;
        $id_sessao = $request->sessao_id;
        $sessao_unica = Seccao::findOrfail($id_sessao);
        $sala = Sala::findOrfail($sessao_unica->sala_id);
        $nome = $request->nome;
        $numero = $request->numero;
        
        $lugares = $request->session()->get('lugares');    

        $reserva->estado = 'activo';
        $reserva->user_id = '1';
        $reserva->seccao_id = $id_sessao;
        $reserva->save();

        $ultima_reserva = Reserva::find(\DB::table('reservas')->max('id'));
        $id_reserva = $ultima_reserva->id;


        foreach($lugares as $lugar){
            $ultima_reserva->lugares()->attach($lugar);
        }
        
       /* if($lugares[1] != '' ){
            foreach($lugares as $lugar){
                $ultima_reserva->lugares()->attach($lugar);
            }

        }else{
            $ultima_reserva->lugares()->attach($lugar1);
        }*/
        

        $pdf = Pdf::loadView('Cliente.gerarpdf', compact('sessao_unica', 'nome', 'numero', 'lugares', 'id_reserva', 'sala'));
        
       return $pdf->setPaper('a4')->download('resererva.pdf');

    }

    public function index(){
        
      //  $filmes 
        $filmes_sessaos = DB::table('filmes')
                        ->whereExists(function ($query){
                        $query->select(DB::raw('*'))
                            ->from('seccaos')
                           // ->join('salas', 'salas.id', '=', 'seccaos.sala_id')
                            ->whereColumn('filmes.id', '=', 'seccaos.filme_id');
                            //->where('salas.cinema_id', '=', 3);
                            
                            
                         })
                        //->where('filmes.id', '=' 'seccaos.filme_id')
                        ->get();
                       
                        //dd($filmes_sessaos);
        
        return view('Cliente.welcome', ['filmes_sessaos' => $filmes_sessaos]);
    }

    

    //dar mais uma olhada
    public function show($id){

        //$idk = request('id'); 
        

        $id = $this->Encri->desencriptar($id);

       // dd($id);

        $filme = Filme::findOrfail($id);
        
        $cinemas = DB::table('cinemas')
        ->whereExists(function ($query){
            //recupera o id do filme pela url
            $idreq = $this->Encri->desencriptar(request('id'));
            $query->select(DB::raw('*'))
            ->from('seccaos')
            ->join('salas', 'salas.id', '=', 'seccaos.sala_id')
            ->whereColumn('cinemas.id', '=', 'salas.cinema_id')
            ->where('seccaos.filme_id', '=', $idreq);  
         })
        ->get();
       // dd($cinemas);

        return view('Cliente.show', ['filme' => $filme, 'cinemas' => $cinemas]);
    }


    public function loadsessao(){
        //$sessoes_fil = array();
        $id_filme = request('id_filme'); 
        $cinema_id = request('cinema_id');

        $seccoes_filme = DB::table('seccaos')->select('seccaos.id', 'seccaos.data_inicio')
        ->join('salas', 'seccaos.sala_id', '=', 'salas.id')
        ->where('salas.cinema_id', '=', $cinema_id)
        ->where('seccaos.filme_id', '=', $id_filme)
        ->get();

        return response()->json($seccoes_filme);   
    }

    public function select_lugar(Request $request){

       // $id = $this->Encri->desencriptar($id);
      //  dd($request->sel_sessao);
        $array_lugares_ocupados = array();
        $id_sessao = $request->sel_sessao;
        $id = $request->id_filme;
        $filme = Filme::findOrfail($id); 
        $sessao = (Seccao::findOrfail($id_sessao));
        
        //pega todos os lugares de uma determinada sala
        $total_lugares_salas = DB::table('lugars')->select('lugars.id')
                            ->join('salas', 'lugars.sala_id', '=', 'salas.id')
                            ->where('salas.id', '=', $sessao->sala_id)->get();

        $qtd_lugares_sala = $total_lugares_salas->count();
        
        //retorna o id dos lugares reservados
        $lugares_oucupados = DB::table('reservas')->select('lugar_reserva.lugar_id')
                             ->join('lugar_reserva', 'reservas.id', '=', 'lugar_reserva.reserva_id')
                             ->where('reservas.seccao_id', '=', $id_sessao)->get();
        
        foreach($lugares_oucupados as $lugares_oucupado){
            $array_lugares_ocupados[] = ($lugares_oucupado->lugar_id);
        }                            

        $qtd_lugares_ocupados = $lugares_oucupados->count();

        if($qtd_lugares_ocupados>$qtd_lugares_sala){
            $qtd_lugares_disponivel = 0;
        }else{
            $qtd_lugares_disponivel = $qtd_lugares_sala - $qtd_lugares_ocupados; 
        }
             
                        
        return view('Cliente.selec_lugar', ['filme' => $filme, 'sessao' => $sessao, 'qtd_lugares_disponivel' => $qtd_lugares_disponivel, 'qtd_lugares_sala' => $qtd_lugares_sala, 'array_lugares_ocupados' => $array_lugares_ocupados, 'total_lugares_salas' => $total_lugares_salas]);
    }

  
}
