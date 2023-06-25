<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="css/acceuil/calendar.css">

    <title>accueil</title>
</head>
<body>
   <!-- nav bar  -->

   <div class="container text-center ">
  <div class="row m-1">
  
    <div class="col-12">
    <nav class="navbar navbar-expand-lg bg-primary"  >
  <div class="container-fluid">
    <img src="https://th.bing.com/th/id/R.41804e4812b5aed781d5038616e5ae00?rik=WLisoDZc6DWxow&pid=ImgRaw&r=0" alt="Bootstrap" width="5%" height="5%">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item fs-5 m-1">
          <a class="nav-link active text-light" aria-current="page" href="#">Acceuil</a>
        </li>
    
        <li class="nav-item fs-5 m-1">
          <a  href="{{ route('login') }}" class="nav-link active text-light" aria-current="page" >Login</a>
        </li>
        <li class="nav-item fs-5 m-1">
          <a  href="{{ route('register') }}" class="nav-link active text-light" aria-current="page">Register</a>
        </li>



      </ul>                 
      <form class="d-flex" role="search">
        <input class="form-control me-1" value="{{ date('Y-m-d') }}" name='date' type="date" >
        <select class="form-select" name='salle' aria-label="Default select example">
  <option selected>la salle</option>
  <option value="ibn rochd">Ibn rochd</option>
  <option value="ibn tofail">Ibn tofail</option>
</select> 
            <button class="btn btn-outline-light" type="submit">Search</button>

    </div>
  </div>
</nav>
    </div>
   
  </div>
   <!-- Les reservations disponible  -->

<div class="row g-0 mt-5 text-center">
 
<table class="table table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">Nom et prenom</th>
      <th scope="col">La duration</th>
      <th scope="col">La salle</th>
      <th scope="col">Statut</th>
      
    </tr>
  </thead> 
  <tbody> @foreach($reservations as $reservation)
    <tr>     

      <th scope="row">{{$reservation['name']}}  {{$reservation['prenom']}}</th>  

     
          <td >de {{$reservation['first']}} a {{$reservation['last']}}</td>
      <td > {{$reservation['salle']}}</td> 
      <td > {{$reservation['validation']}}</td> 
          
   
    </tr>
         @endforeach

  

  </tbody>
</table>
</div>
          </form>

</div>


   
  
</body>
</html>