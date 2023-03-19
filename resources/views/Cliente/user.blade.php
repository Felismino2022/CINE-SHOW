@extends('leyout.main')
@section('titulo', 'Selecionar Lugar')
@section('content')

<div class="text-white py-3">  

    


    <div class="container">
        <div class="row">
        <div class="col-6 offset-3">

        <div class="card">
            <h5 class="card-header text-center text-dark">Preencha os seus dados</h5>
            <div class="card-body">
                <form action="/sucess" method="POST">
                @csrf
                    <div class="py-3">
                        <input type="text" name="nome" id="nome" placeholder="Digite os seu nome" class="form-control" value="{{old('nome')}}">
                          @error('nome')
                          <span class="text-danger"><small>{{$message}}</small></span>
                          @enderror
                    </div>
                    <input type="text" name="seccao_id" id="seccao_id" value="{{$id_sec}}" hidden>
                    <div>
                        <input type="number" name="numero" id="numero" placeholder="Digite o seu número de telemovel" class="form-control" value="{{old('numero')}}">
                        @error('numero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                    <div class="py-3">
                    
                    
                    <button class="btn btn-primary" type="submit">Enviar dados</button>
                    
                    </div>
                </form>
                
            </div>
        </div>
       
    </div>
    </div>
    </div>
    </div>

    <!--Modal-->
  <!-- Button trigger modal -->


<!-- Modal -->

<!-- Modal -->

    <div class="level">

    </div>

@endsection