@extends('leyout.main')
@section('titulo', 'Selecionar Seccao')
@section('content')

<?php
    $enc = new App\Classes\Encri;
?>


<div class="container ">

	<div class="ratio  img-trailer" style="background-image: url({{asset('/img/uploadImagem/' . $filme->trailer)}}) ;
    background-repeat: no-repeat;">
	<!--<iframe src="/video/spiderMan4.mp4" title="YouTube video" allowfullscreen>
	</iframe>-->	
	
		<button type="button" class="btn btn-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
			<ion-icon name="logo-youtube"></ion-icon>
		</button>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      
      <div class="modal-body ">
		<div class="ratio ratio-21x9">

		<video width="320" height="240" controls="controls" >
			<source src="{{asset('/video/spiderMan4.mp4')}}" type="video/mp4">
			<!--video-->
			
			</iframe>
			</div>
      </div>
      
    </div>
  </div>
</div>
	





<div class="container">
	<div class="card bg-dark my-4 py-4">
			<div class="row ">
				<div class="col-sm-5">
				
				<img src="{{asset('/img/uploadImagem/' . $filme->imagem)}}" width="200" height="400" alt="..." class="img-fluid">
				</div>
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-white">{{$filme->titulo}}</h5>
						<p class="card-text text-white">{{$filme->descricao}}</p>

						
						<form action="/selecionar_lugar" name="formCinema" id="formCinema" method="post"
						data-funcoes-url="{{route('ajax-sessoes')}}">
						@csrf
							<div class="row mb-3">
								<select class="form-control" id="sel_cinema" required="">
									<option value=""> Selecione Cinema</option>	
									@foreach($cinemas as $cinema)
									<option value="{{$cinema->id}}">{{$cinema->nome}}</option>	
									@endforeach																
								</select>
							</div>

							<input type="hidden" id="id_filme" name="id_filme" value="{{$filme->id}}">

							<div class="row mb-3">
								<select id="sel_sessao" name="sel_sessao" class="form-control" required="">
									<option value="">Selecionar Seccao</option>				
								</select>
							</div>

								<div>
									<button type=submit class="btn btn-primary" >Reservar Agora</button>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
   $("#sel_cinema").change(function(){
	const url = $('#formCinema').attr("data-funcoes-url");
	var cinema_id = $(this).val();
	var id_filme = $('#id_filme').val();
	//alert(cinema_id);
	//alert(id_filme);
	$.ajax({
	  url: url,
	 
	  data:{
		'cinema_id':cinema_id,
		'id_filme': id_filme,
	  },

	  success:function(data){
		
	   //console.log(data);
	   $('#sel_sessao').empty();
		$.each(data, function(index, sessoes){
			let dat_sessao = new Date(sessoes.data_inicio);
			let hora = `${dat_sessao.getHours()}:${dat_sessao.getMinutes()}` ;
//hora
		  $('#sel_sessao').append('<option value="'+sessoes.id+'">'+hora+'</option>');
		});
	  }
	});
   });
});
</script>

@endsection