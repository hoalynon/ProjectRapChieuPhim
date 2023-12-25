
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <ul class="validation">
        @auth
        <h3>
            <a id="manage" href="{{ route('user.info') }}" title="Manage">
                <span class="hello">Xin chào, {{ Auth::user()->cus_name }}</span>
            </a>
        </h3>
            <li class="nav-item">
                <form id="logoutForm" class="form-inline" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button id="logout" type="submit" class="nav-link btn btn-link text-dark">
                      {{-- <img src="'images\dashboard\logout.png'" alt="Đăng xuất"> --}}
                      Đăng xuất
                    </button>
                </form>
            </li>
            @endauth
    </ul>

     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('admin.slidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content">
      <div class="container-fluid">

          @include('admin.alert')
          
          <div class="row">

            <div class="col-md-12">

              <div class="card card-primary mt-3">
                <div class="card-header" style="background-color:#bf3030;">
                  <h3 class="card-title">{{$title}}</h3>
                </div>

                  @yield('content')
                
              </div>
            </div>
          </div>
      </div>
    </div>

  </div>

  <!-- /.content-wrapper -->
  
    @include('admin.footer')

</body>
</html>
