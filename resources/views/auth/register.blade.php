
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="css/acceuil/calendar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


</head>

<body>

<!-- nav bar  -->

<div class="container  ">
  <div class="row m-1">
  
    <div class="col-12">
    <nav class="navbar navbar-expand-lg bg-primary"  data-bs-theme="dark">
  <div class="container-fluid">
    <img src="https://th.bing.com/th/id/R.41804e4812b5aed781d5038616e5ae00?rik=WLisoDZc6DWxow&pid=ImgRaw&r=0" alt="Bootstrap" width="5%" height="5%">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active" aria-current="page" href="{{url('accuilePublic')}}">Acceuil</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    </div>
        </div>
</div>
 
   <!-- Les reservations disponible  -->

   <div class="container ">
  <div class="row">
  <div class="col">
    </div>
    <div class="col-7">
      <div class="card  border border-primary p-2 mb-2 border-opacity-25" >
  <div class="card-body "> 
    <div class="text-center">    <span class="fs-3">Entrer vous Informations</span>
</div>
  <form class="row g-3 needs-validation" action="{{route('register')}}" method="POST" >
  <!-- Name input -->   @csrf

  <div class="form-outline mb-4 ">    <label class="form-label" for="form5Example1">Nom</label>

    <input type="text" id="form5Example1"  name="name" value="{{ old('name') }}"  class="form-control" required  autocomplete="name" autofocus/>
   
  </div>

  <!-- ¨Prenom input -->
  <div class="form-outline mb-4 ">   
   <label class="form-label"  for="form5Example2">Prenom</label>

    <input type="text" id="form5Example2" name="prenom" value="{{old('prenom')}}" class="form-control" required autocomplete="prenom" autofocus/>
   
  </div>
  <!-- username input -->
  <div class="form-outline mb-4 ">   
   <label class="form-label"  for="form5Example2">Username</label>

    <input type="text" id="form5Example2" name="username" value="{{old('username')}}" class="form-control"  autocomplete="username" autofocus/>
   
  </div>
   <!-- username input -->
   <div class="form-outline mb-4 ">   
   <label class="form-label"  for="form5Example2">Division</label>

   <select class="form-select w-25"  name="division"    autofocus   aria-label="Default select example">
<option value="null"></option>

<option value="service A">division 1</option>
<option value="service B">division 2</option>
</select>   
  </div>
   <div class="form-outline mb-4 ">   
   <label class="form-label"  for="form5Example2">service</label>
<select class="form-select w-25"  name="service"    autofocus   aria-label="Default select example">
<option value="null"></option>

<option value="service A">service A</option>
<option value="service B">service B</option>
<option value="service C">service C</option>
</select>
  </div>
   <div class="form-outline mb-4 ">   
   <label class="form-label"  for="form5Example2">La unité</label>
<select class="form-select w-25"  name="unité"    autofocus   aria-label="Default select example">
<option value="null"></option>
<option value="service A">unité A</option>
<option value="service B">unité B</option>
<option value="service C">unité C</option>
</select>
  </div>
 <!-- Password input -->
 <div class="form-outline mb-4 ">    
<label class="form-label" >Password</label>
    <input type="password" name="password" value="{{old('password')}}"  class="form-control" required autocomplete="new-password" />
    <div class="form-error text-danger">
           @error('password')
        {{$message}}
        @enderror
        </div>
  </div>

  <!-- Submit button -->
  <div class="form-outline text-center mb-4">
   <button type="submit" class="btn btn-primary btn-block mb-4 w-50 ">Subscribe</button>
  </div>
  
</form>
  </div>
</div>

    </div>
    <div class="col">
    </div>
  </div>
</div>
 




   
</body>

</html>

