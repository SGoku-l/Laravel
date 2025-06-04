<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('ecomtemp/css/bootstrap.css') }}" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('ecomtemp/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('ecomtemp/css/responsive.css') }}" rel="stylesheet" /></form>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=pending" />

</head>

<header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-white">{{ Auth::user()->name }}</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-white">{{ strtoupper(substr(Auth::user()->name,0,1)) }}</strong><strong>S</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom"> 
            <!-- Log out-->
            <div class="list-inline-item logout">
                <form action="{{ route('logout') }}" method="post"> 
                    @csrf
                <button class="nav-link" id="logout" style="border: none; background: none; color: red; font-weight: 800;">Logout <i class="icon-logout"></i></button>       
                </form>
            </div>
          </div>
        </div>
      </nav>
    </header>