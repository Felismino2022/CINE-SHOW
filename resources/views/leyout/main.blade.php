<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

     <!--Fonte do google-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto" rel="stylesheet">

    <!--link para o css da aplicação-->
    <link rel="stylesheet" href="/css/style.css">

    <!--Jquery-->
    <script src="/js/jquery/jquery.min.js"></script>

        <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--css e js bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body id="corpo" class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light  p-4">
        <div class="container">

            <a class="navbar-brand text-white"  href="/">CINE<span class='mudarCor'>SHOW</span></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav ml-auto ul_left">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="#">Sobre</a>
                </li>
                     
                <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="#">Contacto</a>
                </li>
            </ul>
            </div>
        </div>
    </nav><!--fim da navbar-->

    @yield('content')
    
    <a class='lik-topo' href="#">&uarr;</a>
    
    <footer  id="rodape" class=" px-0 py-4">

    <div class="container">
        <div class="row">
            
    
        <p class='text-center'>
                <span class='text-cor'>By: FelisminoMuchombo932522208</span>
            </p> 
        </div>
        </div>
    </footer>    <!--fim do rodape-->
    
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
</body>
</html>