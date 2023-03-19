
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('titulo')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <script src="js/jquery/jquery.min.js"></script>
     <!--link para o css da aplicação-->
     <link rel="stylesheet" href="/css/style.css">

    
    <!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Felismino Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            
            <a class="nav-link  {{'dash' == request()->path() ? 'active': ''}}" aria-current="page" href="/dash">
              <span data-feather="home"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Dashboard
            </a>
           
          </li>

          <li class="nav-item ">
            <a class="nav-link  {{'cinema' == request()->path() ? 'active': ''}}" href="/cinema">
              <span data-feather="file"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Cinema
            </a>

          </li>
          <li class="nav-item ">
            <a class="nav-link {{'sala' == request()->path() ? 'active': ''}}" href="/sala">
              <span data-feather="shopping-cart"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Sala
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{'lugar' == request()->path() ?'active':''}}" href="/lugar">
              <span data-feather="users"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Lugar
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{'filme' == request()->path() ? 'active':''}}" href="/filme">
              <span data-feather="bar-chart-2"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Filme
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{'sessao' == request()->path() ? 'active': ''}}" href="/sessao">
              <span data-feather="layers"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Sessão
            </a>
          </li>
          <li class="nav-item  {{'reserva' == request()->path() ? 'active': ''}}">
            <a class="nav-link" href="/reserva">
              <span data-feather="layers"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              Reserva
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              <ion-icon name="ellipse-outline"></ion-icon>
              utilizador
            </a>
          </li>
        </ul>

        
      </div>
    </nav>
      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')
      

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
    </main>
  </div>
</div>

<!--icones-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

      
      
      <script>
        function mostrar_modal(){
            let el = document.getElementById('minha_caixa');
            let minha = new bootstrap.Modal(el);
            minha.show();
        }
    </script>

    <script>
    $("#prov").on("change",function(){
    //$("#selec_seccao").html('');
    var id_cinema = $("#prov").val();
    alert(id_cinema); 
    $.ajax({
    url: '/ajax',
    type: 'POST',
    data:{id: id_cinema},
    beforeSend: function(){
        $("#selec_seccao").html("Carregando");
    },
    success: function(data){
       // alert(data);
        $("#cid").html(data);
        //
    },
    //está  a cair aqui
    error: function(data){
        $("#selec_seccao").html("Ouve um erro ao carregar");
    }
   }); 
});
    </script>
    </body>
</html>
