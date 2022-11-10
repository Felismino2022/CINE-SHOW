<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Pdf</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>
<body>

@php
        $lug = '';
        if(count($lugares) == 2 && $lugares['1'] != ''){
            
            $lug = $lugares['0'] . ',' . $lugares['1'];
        
    }else{
        $lug = $lugares['0'];
    }
   @endphp
    
    <div class="container">
        <h1 class="text-center">CINE<span class="text-warning">SHOW</span> </h1>

        <div class="py-5">
        <h2 class="text-center">Dados Pessoas</h2>
     <div class="col-md-8 offset-2">
       
        <table class="table table-bordered table-hover">
            <thead class="table-warning">
                <tr>
                    <th>Nome</th>
                    <th>Número</th>
                </tr>
            </thead>
                
            <tbody>
                <tr>
                    <td>{{$nome}}</td>
                    <td>{{$numero}}</td>
                </tr>
            </tbody>
        </table>
</div>
</div>

<div class="py-5">
<h2 class="text-center">Dados Reserva</h2>
    <div class="col-md-8 offset-2">
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Cinema</th>
                    <th>Filme</th>
                    <th>Sala</th>
                    <th>Lugar</th>
                    <th>Hora</th>
                </tr>
            </thead>
                
            <tbody>
                <tr>
                    <td>{{$sala->cinema->nome}}</td>
                    <td>{{$sessao_unica->filme->titulo}}</td>
                    <td>{{$sessao_unica->sala->nome}}</td>
                    <td>@php echo $lug @endphp</td>
                    <td>{{date('H:i', strtotime($sessao_unica->data_inicio))}}</td>
                    
                </tr>
            </tbody>
        </table>
</div>
</div>

<p class="text-warning">Salut</p>
    </div>
</body>
</html>