@extends('leyout.mainAdmin')
@section('titulo','Sala')
@section('content')

<div class="my-5">
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>Data da Reserva</th>
            <th>Cliente</th>
            <th>Seccao</th>
            <th>Accao</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reservas as $reserva)
        <tr>
            <td>{{$reserva->data_reserva}}</td>
            <td>{{$reserva->client->user->name}}</td>
            <td>{{$reserva->seccao->data_inicio}}</td>
            
            <td>Elinimar</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
  @endsection