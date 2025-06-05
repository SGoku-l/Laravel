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
  <link rel="shortcut icon" href="{{ asset('ecomtemp/images/shopping-cart.png') }}" type="image/x-icon">

  <title>
   E-Commers
  </title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('ecomtemp/css/bootstrap.css') }}" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('ecomtemp/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('ecomtemp/css/responsive.css') }}" rel="stylesheet" />
</head>

<style>
.search-form input {
  width: 200px;
  transition: all 0.3s ease-in-out;
}

.search-toggle {
  position: relative;
  display: flex;
  align-items: center;
}

.search-toggle #searchForm {
  position: absolute;
  top: 120%;
  right: 0;
  z-index: 9999;
  background: white;
  padding: 5px 10px;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  min-width: 160px;
}


@media (max-width: 576px) {
  .search-form input {
    width: 150px;
  }

  .navbar-toggler {
    border: none;
    background: transparent;
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,..."); /* Add actual toggler icon if needed */
  }
}

</style>

<header class="ark-header">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg ark-navbar align-items-center">
      <!-- Brand -->
      <a class="navbar-brand ark-logo text-white" href="{{ url('/') }}">E-Comm</a>

      <!-- Search & Cart OUTSIDE Toggle -->
      <div class="d-flex align-items-center ml-auto d-lg-none">
        <!-- Search Icon -->
       <div class="search-toggle position-relative mr-2">
        <button id="searchIcon" class="btn btn-link text-white p-0">
          <i class="fa fa-search"></i>
        </button>
        <form id="searchForm" class="search-form d-none position-absolute bg-light p-2 rounded shadow" 
          method="get" action="{{ url('search_product') }}">
          <input type="search" name="search_items" class="form-control form-control-sm rounded-pill px-3" placeholder="Search...">
        </form>
      </div>


        <!-- Cart Icon -->
       @if (Route::has('login'))

       @auth

        <a href="{{ url('mycart') }}" class="btn btn-link text-white position-relative" style="font-size: 1.25rem;">
          <i class="fa fa-shopping-cart"></i>
          @if(isset($count) && $count > 0)
            <span class="badge badge-danger position-absolute" style="top: -5px; right: -10px;">{{ $count }}</span>
          @endif
        </a>
        <a href="{{ url('myorder') }}" class="btn btn-link text-white position-relative" style="font-size: 1.25rem; margin-right: 8px;">
          <i class="fa-regular fa-pen-to-square"></i>
          @if(isset($orderss) && $orderss > 0)
            <span class="badge badge-danger position-absolute" style="top: -5px; right: -8px;">{{ $orderss }}</span>
          @endif
        </a>

         @else
         <div class="ark-user-options-mobile d-lg-none mt-2">
              <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm btn-block w-100 mb-2">Login</a>
        </div>

        @endauth
       
       @endif

        <!-- Navbar Toggler -->
        <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#arkNav">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <!-- Main Navbar -->
      <div class="collapse navbar-collapse" id="arkNav">
        <ul class="navbar-nav ml-auto ark-menu">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('shop') }}">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('why') }}">Why Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
        </ul>
        <!-- Mobile User Options -->
        <div class="ark-user-options-mobile d-lg-none mt-3">
          @if(Route::has('login'))
            @auth
              <form action="{{ route('logout') }}" method="post" class="mb-2">
                @csrf
                <button class="btn btn-outline-light btn-sm btn-block w-100">Logout</button>
              </form>
            @else
              <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm btn-block w-100 mb-2">Login</a>
              <a href="{{ url('/register') }}" class="btn btn-outline-light btn-sm btn-block w-100 mb-2">Register</a>
            @endauth
          @endif
        </div>


        <!-- Right-Side Options (only on large screens) -->
        <div class="ark-user-options d-none d-lg-flex align-items-center gap-2 ml-3">
          @if(Route::has('login'))
            @auth
              <form action="{{ route('logout') }}" method="post" class="d-inline">
                @csrf
                <button class="btn ark-btn-outline-light">Logout</button>
              </form>
              <a href="{{ url('mycart') }}" class="btn ark-btn-light">
                Cart <i class="fa fa-shopping-bag"></i> {{ $count }} Products
              </a>
              <a href="{{ url('myorder') }}" class="btn ark-btn-light">
                <i class="fa-regular fa-pen-to-square"></i> {{ $orderss }} Orders
              </a>
            @else
              <a href="{{ url('/login') }}" class="btn ark-btn-light">Login</a>
              <a href="{{ url('/register') }}" class="btn ark-btn-light">Register</a>
            @endauth
          @endif

          <!-- Desktop Search -->
          <form class="form-inline d-inline-block" method="get" action="{{ url('search_product') }}">
            <input type="search" name="search_items" value="{{ @$search }}" class="form-control form-control-sm me-2 rounded-pill px-3 glass-input" placeholder="Search Products...">
            <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</header>

