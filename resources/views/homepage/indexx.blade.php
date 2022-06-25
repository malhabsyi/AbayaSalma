<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="\css\main.css ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Abaya Salma</title>
  </head>
  <body>
  



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid" >

    <div id="menusidebar">
  
      <div id="sidebar-container" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
      <div class="close_sidebar"><p class="btn btn-primary">X</p></div>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
      </ul>
      <hr>
      <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
      </div>
      </div>
 
      </div>
    <div class="menu"><p class="btn btn-primary">menu</p></div>
    <div class="navbar-logo"><img src="{{ asset('image/logo-text.jpg') }}" height="44" width="auto" class="fit--contain" style="max-width: 100%;" alt="halo gais lagi"></div>
    <div class="profile"><p class="btn btn-primary">profile</p></div>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    @php $i = 0; @endphp
    @foreach ($slider as $itemslider)
    
    <div class="carousel-item {{ $i == '0' ? 'active':'' }}">
    @php $i++; @endphp
      <img src="{{ asset('uploads/slider/'.$itemslider->image) }}" class="d-block w-100" alt="slider image">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $itemslider->heading }}</h5>
        <p>{{ $itemslider->description }}</p>
        <a href="{{ $itemslider->link }}"class="btn btn-primary">{{ $itemslider->link_name }}</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
<br>
<div class="all-products-text">
  <h5>🔥 All Products 🔥</h5>
</div>
<br>
<div id="products-item"class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($slider as $itemslider)
  <div class="col">
    <div class="card h-100">
      <img src="{{ asset('uploads/slider/'.$itemslider->image) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $itemslider->heading }}</h5>
        <p class="card-text">{{ $itemslider->description }}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="banner-promotion">
<img src="{{ asset('image/foto-branding.jpg') }}" width="100%" alt="halo gais lagi">
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>