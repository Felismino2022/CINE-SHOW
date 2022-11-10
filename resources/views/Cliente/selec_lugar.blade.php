@extends('leyout.main')
@section('titulo', 'Selecionar Lugar')
@section('content')

<div>
<div class="container">
    <div class="row">
        <h3 class="text-white text-center pt-2">Escolha o seu Lugar</h3>
        <div class="col-md-6 bg-secondary py-3 px-3 my-3 mx-3 rounded-2">
            <label class="text-white">Filme : {{$filme->titulo}}</label>
            <br>
            <label class="text-white">Data Lancamento: {{date('d/m/Y' ,strtotime($filme->data_lancamento))}}</label>
            <br>
            <label class="text-white">Duracao: {{$filme->duracao}} horas</label>
            <br>
            <label class="text-white">Seccao: {{date('H:i', strtotime($sessao->data_inicio))}}</label>
        </div>

    <div class="col-md-4 bg-secondary py-3 px-3 my-3 mx-3 rounded-2">

        <label class="text-white">Lugares Disponiveis : {{$qtd_lugares_disponivel}}</label>
			<br>
			<label id="lugarocupado" class="text-white">Lugare(s) Selecionado(s) : </label>
			<br>
			<label class="text-white">Quantidade de Lugar :</label>

        
            <select id="qtd_lugar" name="qtd_lugar" class="form-element">
                    <option value="1">1</option>
                    <option value="2">2</option>
            </select>
          

    </div>
    </div>
</div>

<div class="container">
    <div class="row text-white">
        <div class="col-md-6">
            @php
                
                $i=1;
                    foreach($total_lugares_salas as $total_lugares_sala){
                        if(in_array($total_lugares_sala->id,$array_lugares_ocupados)){
            @endphp
            <span id="@php echo $total_lugares_sala->id @endphp" style="background-color:black" class="place text-white my-3 py-6 px-3 mx-2 " >@php echo $i @endphp</span>
                    @php     }else{ @endphp
                        <span id="num@php echo $total_lugares_sala->id @endphp" style="background-color:blue" class="place text-white my-3 py-6 px-3 mx-2 point" onclick="selec_lugar(@php echo $total_lugares_sala->id @endphp)" value="@php echo $total_lugares_sala->id @endphp">@php echo $i @endphp</span>
                       @php    
                        }
                       $i = $i+1;
                    }
                    @endphp
        </div>
    </div>
</div>

<div class="container">
    <div class="row py-5 ">
            <div class="col ">
                <span id="livre" class="text-white bg-primary py-1 px-3 mx-2"></span> 
                <span class="text-white">Livre</span>
                <span id="ocupado" style="background-color:black" class="text-white py-1 px-3 mx-2"></span> 
                <span class="text-white">ocupado</span>
                <span id="selecionado" class="text-white bg-success py-1 px-3 mx-2"></span>  
                <span class="text-white">selecionado</span>
            </div>
    </div>
</div>



</div>

<input  type='text'  id='num_lugar' name="num_lugar" hidden>
<input type="text" id="id_seccao" value='{{$sessao->id}}' hidden>





<div class="container">
    <button class="btn btn-primary" onclick="getUser()" >Seguinte</button>
</div>




<div class="altura">

</div>


<script src="/js/escolher_lugar.js"></script>
<script type="text/javascript">


</script>
@endsection
