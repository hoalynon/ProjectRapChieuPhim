<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <i class="fas fa-film"></i>
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Tài khoản Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


<!-- Các slidebar nhỏ của mình nằm ở đây -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>
                Thể Loại Phim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/types/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thể loại</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/types/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thể loại</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Phim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/movies/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm phim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/movies/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phim</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>
                Suất chiếu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/slots/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm suất chiếu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/slots/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách suất chiếu</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
                Phòng chiếu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/rooms/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm phòng chiếu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/rooms/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phòng chiếu</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chair"></i>
              <p>
                Vị trí ngồi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/seats/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm vị trí ngồi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/seats/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách vị trí ngồi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                  Khuyến mãi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/discounts/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm khuyến mãi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/discounts/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khuyến mãi</p>
                </a>
              </li>
            </ul>
          </li>
<!-- 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Tài khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/accounts/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài khoản</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Khách hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/customers/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khách hàng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Vé xem phim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/tickets/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách vé</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Hóa đơn
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/bills/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách hóa đơn</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Doanh thu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/revenue/month" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doanh thu tháng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/revenue/year" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doanh thu năm</p>
                </a>
              </li>
            </ul>
          </li>

<!-- Kết thúc các slidebar nhỏ của mình -->



    <!-- /.sidebar -->
  </aside>

  @yield('slidebar')