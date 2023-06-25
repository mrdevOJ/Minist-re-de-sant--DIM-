@extends('layouts.app')

@section('content')



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/card/style.css">


    <title>Reservation</title>
</head>
<body>
   <!-- nav bar  -->

   <div class="container  ">
  <div class="row m-1">
  
    <div class="col-12">
    <nav class="navbar navbar-expand-lg bg-primary"  >
  <div class="container-fluid ">
    <img src="https://th.bing.com/th/id/R.41804e4812b5aed781d5038616e5ae00?rik=WLisoDZc6DWxow&pid=ImgRaw&r=0" alt="Bootstrap" width="5%" height="5%">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item fs-5 m-1 ">
          <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">Acceuil</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light" aria-current="page" href="{{ route('Salles.index') }}">Salles</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light" aria-current="page" href="{{ route('historique.index') }}">Historique</a>
        </li>
        
       
      </ul>


      <div class="container">
              
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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

    </div>
  </div>
</nav>
    </div>
 </div>


  

  
 
   <!-- La reservation du Salle  -->

@if(Auth::user()->name>0)
   <div class="container ">
  <div class="row">
  <div class="col-1"></div>
    <div class="col-10">
      <div class="card  border border-primary p-2 mb-2 border-opacity-25" >
  <div class="card-body "> 
    <div class="text-center"> 
           <span class="fs-3">Entrer vous Reservation</span>
</div>





  <form class="row g-3 needs-validation" action="{{route('reservation.update',[$reservation->id])}}"method="POST" >
    @csrf
    @method ('PUT')

  <div class="form-outline mb-4 "> <ul class="list-group list-group-flush">
  <li class="list-group-item">Vous Informations :</li>
  <li class="list-group-item">Nom: {{ $reservation->name}}</li>
  <li class="list-group-item">Prenom: {{ $reservation->prenom }}</li>
   @if($reservation->division !== 'null' || $reservation->service !== 'null')
  <li class="list-group-item">Division :  <span class="text-danger">{{ $reservation->division }}</span></li>
  <li class="list-group-item">Service :  <span class="text-danger">{{ $reservation->service }}</span></li>
    @else
  <li class="list-group-item ">unité : <span class="text-danger">{{ $reservation->unite }}</span> </li>
  @endif
</ul>   

  <!-- Choix de La durée input -->
<!-- <input type="hidden" name="name" value="{{ $reservation->name }}">
<input type="hidden" name="prenom" value="{{ $reservation->prenom }}">
<input type="hidden" name="username" value="{{ $reservation->username }}">
<input type="hidden" name="division" value="{{ $reservation->division }}"> 
<input type="hidden" name="service" value="{{ Auth::user()->service }}"> 
<input type="hidden" name="unite" value="{{ $reservation->unite  }}">  -->
 <!-- @if(count($salles) > 0) -->
<!-- <label class="form-label"  for="form5Example2">Choisir la salle</label>

<select class="form-select w-25"  name="salle" required autofocus   aria-label="Default select example">
  @foreach($salles as $salle)

  <option >{{$salle['NomSalle']}}</option>
  @endforeach
</select> -->
  

   <label class="form-label"  for="form5Example2">La Durée</label><br>
   <span class="fs-6">  entre de <b>{{$reservation->first }} </b>a <b>{{$reservation->last }}</b> </span>
<!-- <input class="form-control w-25"  pattern="\b(?:0[89]|1[0-8]):[0-5]\d\b" value="{{$reservation->first }}" required type="time" name="first"> 
<input class="form-control w-25"  pattern="\b(?:0[89]|1[0-8]):[0-5]\d\b" value="{{$reservation->last }}" required type="time" name="last">  -->

   <!-- <select class="form-select w-25"  name="time" required autofocus   aria-label="Default select example">
  <option selected value=null >Choisir la durée</option>
  <option value="8:00 a 9:00">8:00 a 9:00</option>
  <option value="9:00 a 10:00">9:00 a 10:00</option>
  <option value="10:00 a 11:00">10:00 a 11:00</option>
  <option value="11:00 a 12:00">11:00 a 12:00</option>
  <option value="12:00 a 13:00">12:00 a 13:00</option>
  <option value="13:00 a 14:00">13:00 a 14:00</option>
  <option value="14:00 a 15:00">14:00 a 15:00</option>
  <option value="15:00 a 16:00">15:00 a 16:00</option>
  <option value="16:00 a 17:00">16:00 a 17:00</option>
  <option value="17:00 a 18:00">17:00 a 18:00</option>
</select> -->

   
  </div>
 

 
  <select  class="form-select w-25"   name="validation" required autofocus   aria-label="Default select example">
  <option   selected value="en cours de traitement">en cours de traitement</option>
  <option    value="resevation  validée">resevation est validée</option>
  <option    value="resevation  rapporté">resevation rapporté</option>
  
</select>



 <!-- La date input -->
 <!-- <div class="form-outline mb-4 ">    
<label class="form-label" >La date</label>
    <input type="date" name="date" value="{{$reservation->date }}"  class="form-control w-25" required autocomplete="new-date" />
    <!-- <div class="form-error text-danger">
           @error('date')
        {{$message}}
        @enderror
        </div> -->
  </div>

  <!-- Submit button -->
  <div class="form-outline text-center mb-4">
   <button type="submit" class="btn btn-primary btn-block mb-4 w-50 ">Submit</button>
  </div>
  
</form>
  </div>
</div>

    </div>
   
  </div>
</div>
</div>
@else 

<h1 class="fs-1 text-danger">reconnecter </h1>
   
  @endif
  <!-- @endif -->
</body>
</html>



