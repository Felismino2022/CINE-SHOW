@extends('leyout.mainAdmin')
@section('titulo','Cinema')
@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cinemas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
  </div>

    <!--MODAL-->
  <div class="modal fade"  id="minha_caixa" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title"><strong> Adicionar Cinema</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>

        <form action="/inserircinema" name="formCinema" id="formCinema" method="POST" 
         data-funcoes-url="{{route('ajax-cidades')}}">
        @csrf
          <div class="modal-body">

            <div>
              <label for="nome_cinema"><strong>Nome do Cinema:</strong></label>
              <input type="text" name="nome_cinema" id="nome_cinema" class="form-control" placeholder="Digite o nome do Cinema">
            </div>

            <div class="my-4">
              <label for="prov"><strong>Provincia:</strong></label>
              <select name="prov_id" id="prov_id" class="form-control">
                <option value="">Seleciona a Provincia</option>
                @foreach($provincias as $provincia)
                <option value="{{$provincia->id}}">{{$provincia->nome}}</option>
                @endforeach
                </select>
                </div>

            <div>
              <label for="cid"><strong>Cidade:</strong></label>
              <select name="cid" id="cid" class="form-control">
              <option value="">Seleciona a Cidade</option>
              </select>
            </div>
          </div>

        <div class="modal-footer">
          <button type="btn" class="btn btn-ligth"><a href="/cinema">Cancelar</a> </button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
                                        
      </form>                                       
    </div>
   </div>
    </div>
  </div><!--Fim modal-->

  <div class="rigth my-4">
   
    <button class="btn btn-dark" onclick=mostrar_modal()>Adicionar Cinema</button>
</div>

  <div>
<div >
  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Acção</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cinemas as $cinema)
        <tr>
            <td>{{$cinema->nome}}</td>
            <td>{{$cinema->cidade->nome}}</td>
            <td><a href="">Editar</a>
            <form class="form" action="/delete/{{$cinema->id}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">deletar</button>
            </form>
        </tr>
        @endforeach
    </tbody>
  </table>
 
  </div>
   <script type="text/javascript">

      $(document).ready(function(){
         $("#prov_id").change(function(){
          const url = $('#formCinema').attr("data-funcoes-url");
          var provincia_id = $(this).val();
          //alert(provincia_id);
          $.ajax({
            url:'ajax-cidades',
           
            data:{
              'provincia_id':provincia_id,
            },

            success:function(data){
             console.log(data);
             $('#cid').empty();
              $.each(data, function(index, cinemas){

                $('#cid').append('<option value="'+cinemas.id+'">'+cinemas.nome+'</option>');
              });
            }
          });
         });
      });

  /*  $("#prov_id").on('change', function(e){
      
      var provincia_id = e.target.value;
      alert(provincia_id);

      //ajax
      $.post('/ajax-cidades?provincia_id=' + provincia_id, function(data){
        //sucess data
        console.log(data);
      });
    });*/

   </script>

@endsection
