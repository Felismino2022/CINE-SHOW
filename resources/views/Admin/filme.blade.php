@extends('leyout.mainAdmin')
@section('titulo','Filme')
@section('content')

@isset($usersType)
  // $usersType is defined and is not null...
@endisset

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Filmes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
  </div>

  <div class="modal fade"  id="minha_caixa" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title"><strong> Adicionar Filme</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>

        <form action="/inserirfilme" name="formCinema" id="formCinema" method="POST" 
         data-funcoes-url="{{route('ajax-cidades')}}" enctype="multipart/form-data">
        @csrf
          <div class="modal-body">

            <div>
              <label for="nome_filme"><strong>Titulo do Filme:</strong></label>
              <input type="text" name="nome_filme" id="nome_filme" class="form-control" placeholder="Digite o titulo do Filme">
            </div>

            <div class="my-4">
              <label for="video"><strong>Video:</strong></label>
              <input type="text" name="video" id="video" class="form-control" placeholder="Digite o link do video">
            </div>

            <div >
              <label for="data_lancamento"><strong>Data de Lançamento</strong></label>
              <input type="date" name="data_lancamento" id="data_lancamento" class="form-control">
            </div>

            <div class="my-4">
              <label for="duracao"><strong>Duração do Filme</strong></label>
              <input type="text" name="duracao" id="duracao" class="form-control" placeholder="Duração do Filme">
            </div>

            <div class="my-4">
              <label for="actor"><strong>Actor do Filme:</strong></label>
              <input type="text" name="actor" id="actor" class="form-control" placeholder="Digite o actor do Filme">
            </div>

            <div>
              <label for="imagem">Imagem do Filme:</label>
                <input type="file" class="form-control-file" name="imagem" id="imagem">
            </div>

            <div class="my-4">
              <label for="trailer"><strong>Trailer do Filme:</strong></label>
              <input type="file" name="trailer" id="trailer" class="form-control">
              
            </div>   
            
            <div >
              <label for="descricao"><strong>Descrição do Filme</strong></label>
              <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição do Filme" class="form-control">

              </textarea>
            </div>
          </div>

        <div class="modal-footer">
          <button type="btn" class="btn btn-ligth"><a href="/filme">Cancelar</a> </button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
                                        
      </form>                                       
    </div>
   </div>
    </div>
  </div><!--Fim modal-->

  <div class="rigth my-4">
   
    <button class="btn btn-dark" onclick=mostrar_modal()>Adicionar Filme</button>
</div>

  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Data de Lançamento</th>
            <th>Duração</th>
            <th>Descrição</th>
            <th>Acção</th>
        </tr>
    </thead>
    <tbody>
    @foreach($filmes as $filme)
        <tr>
            <td>{{$filme->titulo}}</td>
            <td>{{$filme->data_lancamento}}</td>
            <td>{{$filme->duracao}} <strong>horas</strong></td>
            <td>{{$filme->descricao}}</td>
            <td>Elinimar</td>
        </tr>
        @endforeach
    </tbody>
  </table>


@endsection
