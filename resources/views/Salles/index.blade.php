<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="card/style.css" rel="stylesheet">

    <title>Salles</title>
</head>
<body>
   <!-- nav bar  -->

   <div class="container  ">
  <div class="row m-1">
  
    <div class="col-12">
    <nav class="navbar navbar-expand-lg bg-primary"  >
  <div class="container-fluid ">
    <img src="https://th.bing.com/th/id/R.41804e4812b5aed781d5038616e5ae00?rik=WLisoDZc6DWxow&pid=ImgRaw&r=0" alt="Bootstrap" width="5%" height="5%">
 
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item fs-5 m-1 ">
          <a class="nav-link active text-light"  href="{{route('home')}}">Acceuil</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light" href="{{route('Salles.index')}}">Salles</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light"  href="#">Historique</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light"  href="{{route('reservation.create')}}">Nouvelle reservation</a>
        </li>
        
       
      </ul>  </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>





      
  
  </div>
</nav>
    </div>
 </div>


 
   </div>
 


    

 
<!-- Les Salles disponible  -->
@if(count($salles) > 0)

<div class="row">      
  

    @foreach($salles as $salle)
<div class="col">    


  <div class="center">
<a  href="{{route('reservation.create')}}" >

  <div class="article-card">
    <div class="content">
      <p class="date">Capacité : {{$salle['Capacité']}}</p>
      <p class="title"> Nom: {{$salle['NomSalle']}}</p>
      <p class="title">Localisation : {{$salle['Localisation']}}</p>
    </div>
    <img src="{{$salle['Image']}}" alt="article-cover" /></a>
    </div>

  </div>

 </a> 

</div>
 
@endforeach

</div>


@endif

   
  
</body>
</html>



