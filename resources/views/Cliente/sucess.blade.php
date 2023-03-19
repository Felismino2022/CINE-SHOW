@extends('leyout.main')
@section('titulo', 'confirmar')
@section('content')

    @php
         
    $lug = implode(",", $lugares);
  
    @endphp

   

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 bg-secondary py-3 px-3 my-3 mx-3 ">
            <form action="/gerarpdf" method="post">
                @csrf
            <h2 class="text-white text-center">Confirmar dados </h2>
            <br>
            <p class="text-white text-center">Cinema: {{$sala->cinema->nome}} </p>
            <br>
            <p class="text-white text-center">Filme: {{$sessao_unica->filme->titulo}}</p>
            <br>
            <p class="text-white text-center">Sessao: {{date('H:i', strtotime($sessao_unica->data_inicio))}}</p>
            <input type="text" name="sessao_id" id="sessao_id" value="{{$sessao_unica->id}}"  hidden>
            <br>
            <p class="text-white text-center">Sala: {{$sessao_unica->sala->nome}}</label>
            <p class="text-white text-center">Lugar: @php echo $lug @endphp</label>
            <h4 class="text-white text-center">Dados Pessoas</h4><br>
            <p class="text-white text-center">Nome: {{$nome}}</p><br>
            <input type="text" name="nome" id="nome" value="{{$nome}}"  hidden>
            <p class="text-white text-center">Número: {{$numero}}</p>
            <input type="text" name="numero" id="numero" value="{{$numero}}"  hidden>
            
            <button id="sucess" type="submit" class="btn btn-primary btn-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Confirmar</button>
           
            
            </form>
        </div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center"><strong>Reservado com sucesso, por favor aguarde pelo pdf...</strong></p>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="alargar">

</div>
@endsection