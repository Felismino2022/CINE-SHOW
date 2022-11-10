@extends('leyout.mainAdmin')
@section('titulo','Lugar')
@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lugares</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
  </div>

   <!--MODAL-->
   <div class="modal fade"  id="minha_caixa" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title"><strong> Adicionar Lugar</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>

        <form action="/inserirlugar" name="formCinema" id="formCinema" method="POST" 
         data-funcoes-url="{{route('ajax-cidades')}}">
        @csrf
          <div class="modal-body">

            <div>
              <label for="nome_lugar"><strong>Lugar:</strong></label>
              <input type="text" name="nome_lugar" id="nome_lugar" class="form-control" placeholder="Digite o lugar">
            </div>

            <div class="my-4">
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
          <button type="btn" class="btn btn-ligth"><a href="/lugar">Cancelar</a> </button>
          <button type="submit" class="btn btn-primary">Adicionar Lugar</button>
                                        
      </form>                                       
    </div>
   </div>
    </div>
  </div><!--Fim modal-->

  <div class="rigth my-4">
   
    <button class="btn btn-dark" onclick=mostrar_modal()>Adicionar Cinema</button>
</div>

  <div>

  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>sala</th>
            <th>Acção</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lugares as $lugar)
        <tr>
            <td>{{$lugar->nome}}</td>
            <td>{{$lugar->sala->nome}}</td>
            <td><a href="">Editar</a>
            
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
