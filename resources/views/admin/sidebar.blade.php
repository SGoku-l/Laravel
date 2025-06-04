 <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
       <div class="sidebar-header d-flex align-items-center">
          <div class="avatar">
            <img src="{{ asset('ecomtemp/images/gokul.jpg') }}" alt="..." class="img-fluid rounded-circle">
          </div>
          <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p>Web Designer</p>
          </div>
        </div>

        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>
                 <li class="{{ request()->is('view_catagory') ? 'active' : '' }}">
                <a href="{{ url('view_catagory') }}">
                    <i class="fa-solid fa-layer-group"></i> Category
                </a>
            </li>


                   <li class="{{ request()->is('add_products') || request()->is('view_products') ? 'active' : '' }}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa-solid fa-box"></i> Products</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ request()->is('add_products') || request()->is('view_products') ? 'show' : '' }}">
                    <li><a href="{{ url('add_products') }}" class="{{ request()->is('add_products') ? 'active' : '' }}">Add Products</a></li>
                    <li><a href="{{ url('view_products') }}" class="{{ request()->is('view_products') ? 'active' : '' }}">View Products</a></li>
                  </ul>
                </li>

                <li class="{{ request()->is('view_orders') ? 'active' : '' }}">
                <a href="{{ url('view_orders') }}">
                    <i class="fa-solid fa-cart-shopping"></i> Orders
                </a>
            </li>

              </ul>  
      </nav>
      <!-- Sidebar Navigation end-->

      <style>
        .sidebar-header .avatar {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .sidebar-header .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

      </style>