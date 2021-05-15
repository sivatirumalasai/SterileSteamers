 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ URL::asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SterileSteamers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Logout
                </p>
               </a>  </li>  
               <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form>    
          <li class="nav-item">
            <a href="{{ url("admin/dashboard")}}" class="nav-link {{ ($title==='dashboard')? "active": "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url("admin/products")}}" class="nav-link {{ ($title==='products')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url("admin/accessories")}}" class="nav-link {{ ($title==='accessories')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accessories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url("admin/plans")}}" class="nav-link {{ ($title==='plans')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Plans
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("features.index")}}" class="nav-link {{ ($title==='features')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Features
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("services.index")}}" class="nav-link {{ ($title==='services')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("orders.index")}}" class="nav-link {{ ($title==='Orders')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("coupons.index")}}" class="nav-link {{ ($title==='coupons')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Coupons
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route("services.index")}}" class="nav-link {{ ($title==='services')? "active": "" }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Services Requests
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>