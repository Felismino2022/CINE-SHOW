@extends('leyout.main')
@section('titulo', 'Sistema de Reserva em um determinado Cinema')
@section('content')


<?php
    $enc = new App\Classes\Encri;
?>
<!--Carossel-->

<div id="carouselExampleControls" class="carousel slide container" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{asset('/img/img1.jpeg')}}" class="d-block w-100" alt="imagen1"/>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('/img/img2.jpeg')}} " class="d-block w-100" alt="imagen2"/>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('/img/img3.jpeg')}}" class="d-block w-100" alt="imagen3"/>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>



<!--Escolha de filme e Cinema-->

<section>
    <div class="container ">
            <div class="bg-exi my-4 exibicao">
            <p class="text-center p-2 text-cor">Em Exibição</p>
            </div>
    </div>

    <!--Imagens-->
    <div class="container">

        <div class="row">
            <!--O loop-->
            @foreach($filmes_sessaos as $filmes_sessao)
                <div class="col-md-3 col-sm-4 col-6">
                    <a href="{{route('selecionar', ['id' => $enc->encriptar($filmes_sessao->id)])}}" class="titulo">
                        <img id="img-cartaz" src="{{asset('/img/uploadImagem/'.$filmes_sessao->imagem)}}" alt="{{$filmes_sessao->titulo}}" class="img-fluid imagem">
                        <p class="titulo_filme">{{$filmes_sessao->titulo}}</p>
                    </a>
                    <p class="tipo">Acção, Aventura</p>
                </div>
            @endforeach
            <!--Fim loop-->

        </div>
    </div><!--fim das imagens--> <!--Fim Exibiçã<o-->
        </section>

        
<!--filme em Exibição-->

@endsection