@extends('leyout.mainAdmin')
@section('titulo','Sala')
@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Salas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
  </div>

  <div class="modal fade"  id="minha_caixa" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title"><strong> Adicionar Sala</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>

        <form action="/inserirsala" name="formCinema" id="formCinema" method="POST" 
         data-funcoes-url="{{route('ajax-cidades')}}">
        @csrf
          <div class="modal-body">

            <div>
              <label for="nome_cinema"><strong>Sala:</strong></label>
              <input type="text" name="nome_sala" id="nome_sala" class="form-control" placeholder="Digite a sala">
            </div>

            <div class="my-4">
              <label for="capacidade"><strong>Capacidade</strong></label>
              <input type="text" name="capacidade" id="capacidade" class="form-control" placeholder="Digite a capacidade">
            </div>

            <div>
              <label for="cinema"><strong>Cinema:</strong></label>
              <select name="cinema" id="cinema" class="form-control">
              <option value="">Seleciona o Cinema</option>
              @foreach($cinemas as $cinema)
              <option value="{{$cinema->id}}">{{$cinema->nome}}</option>
              @endforeach
              </select>
            </div>
          </div>

        <div class="modal-footer">
          <button type="btn" class="btn btn-ligth"><a href="/sala">Cancelar</a> </button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
                                        
      </form>                                       
    </div>
   </div>
    </div>
  </div><!--Fim modal-->

  <div class="rigth my-4">
   
    <button class="btn btn-dark" onclick=mostrar_modal()>Adicionar Sala</button>
</div>

  <div>


  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Capacidade</th>
            <th>Cinema</th>
            <th>Acção</th>
        </tr>
    </thead>
    <tbody>
    @foreach($salas as $sala)
        <tr>
            <td>{{$sala->nome}}</td>
            <td>{{$sala->capacidade}}</td>
            <td>{{$sala->cinema->nome}}</td>
            <td><a href="">Editar</a>
            
        </tr>
        @endforeach
    </tbody>
  </table>
 

@endsection
