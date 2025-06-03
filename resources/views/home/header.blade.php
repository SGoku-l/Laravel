<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
   E-Comm
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('ecomtemp/css/bootstrap.css') }}" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('ecomtemp/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('ecomtemp/css/responsive.css') }}" rel="stylesheet" />
</head>


<header class="ark-header">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg ark-navbar">
      <a class="navbar-brand ark-logo text-white" href="{{ url('/') }}">E-Comm</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#arkNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="arkNav">
        <ul class="navbar-nav ml-auto ark-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ url('shop') }}">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('why') }}">Why Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('contact')}}">Contact</a></li>
        </ul>

        <div class="ark-user-options ml-auto">
          @if(Route::has('login'))
            @auth
              <form action="{{ route('logout') }}" method="post" class="d-inline">
                @csrf
                <button class="btn ark-btn-outline-light">Logout</button>
              </form>
              <a href="{{ url('mycart') }}" class="btn ark-btn-light">
                Cart <i class="fa fa-shopping-bag"></i> {{ $count }} Products
              </a>
            @else
              <a href="{{ url('/login') }}" class="btn ark-btn-light">Login</a>
              <a href="{{ url('/register') }}" class="btn ark-btn-light">Register</a>
            @endauth
          @endif

          <form class="form-inline d-inline-block search-form" method="get" action="{{ url('search_product') }}">
            <input type="search" name="search_items" value="{{ @$search }}" class="form-control form-control-sm me-2 rounded-pill px-3 glass-input"  placeholder="Search Products...">
            <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</header>

