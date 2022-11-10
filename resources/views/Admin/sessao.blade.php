@extends('leyout.mainAdmin')
@section('titulo', 'sessao')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sessões</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
  </div>

  <div class="modal fade"  id="minha_caixa" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title"><strong> Adicionar Sessão</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>

        <form action="/inserirseccao" name="formCinema" id="formCinema" method="POST" 
         data-funcoes-url="{{route('ajax-cidades')}}">
        @csrf
          <div class="modal-body">

            <div>
              <label for="preco"><strong>Preço:</strong></label>
              <input type="text" name="preco" id="preco" class="form-control" placeholder="Digite o preço">
            </div>

            <div class="my-4">
              <label for="filme"><strong>Filme:</strong></label>
              <select name="filme" id="filme" class="form-control">
              <option value="">Seleciona o filme</option>
              @foreach($filmes as $filme)
                <option value="{{$filme->id}}">{{$filme->titulo}}</option>
              @endforeach
              </select>
            </div>

            <div>
              <label for="sala"><strong>Sala:</strong></label>
              <select name="sala" id="sala" class="form-control">
              <option value="">Seleciona a Sala</option>
              @foreach($salas as $sala)
              <option value="{{$sala->id}}">{{$sala->nome}}</option>
              @endforeach
              </select>
            </div>
          </div>

        <div class="modal-footer">
          <button type="btn" class="btn btn-ligth"><a href="/sessao">Cancelar</a> </button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
                                        
      </form>                                       
    </div>
   </div>
    </div>
  </div><!--Fim modal-->

  <div class="rigth my-4">
   
    <button class="btn btn-dark" onclick=mostrar_modal()>Adicionar Sessão</button>
</div>

  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Data de Inicio</th>
            <th>Preço</th>
            <th>Filme</th>
            <th>Sala</th>
            <th>Acção</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sessoes as $sessao)
        <tr>
            <td>{{$sessao->data_inicio}}</td>
            <td>{{$sessao->preco}}</td>
            <td>{{$sessao->filme->titulo}}</td>
            <td>{{$sessao->sala->nome}}</td>
            <td>Elinimar</td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection