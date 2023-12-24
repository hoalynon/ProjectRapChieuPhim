@extends ('user.main')

@section ('head')
    <link rel="stylesheet" href="/template/css/info.css">

@endsection

@section ('content')

    <!--Tạo header cho trang-->
    <header>
            <a href="/user/menu">
                <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo" class="logo">
            </a>
            <input type="checkbox" id="menu">
            <label for="menu"> 
                <i class="fa-solid fa-bars"></i></label>
            <nav>
              <ul>
                <li>
                  <a href="#0">Phim ▾</a>
                  <ul class="dropdown">
                    <li> <a href="/user/film_rc">Phim đang chiếu</a></li>
                    <li> <a href="/user/film_cm">Phim sắp chiếu</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#0">Lịch chiếu</a>
                </li>
                <li>
                  <a href="#0">Đặt vé</a>
                </li>
                <li>
                  <a href="#0">Thành viên ▾</a>
                  <ul class="dropdown">
                    <li> <a href="#1">Tài khoản thành viên</a></li>
                    <li> <a href="#1">Quyền lợi</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#0">Khuyến mãi ▾</a>
                  <ul class="dropdown">
                    <li> <a href="#1">Đang diễn ra</a></li>
                    <li> <a href="#1">Sắp tới</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#0">Giới thiệu</a>
                </li>
                <li>
                  <a href="#0">Liên hệ</a>
                </li>
            </ul>
            </nav>
            
            {{-- <partial name="_LoginPartial" /> --}}
              <ul class="navbar-nav">
                @auth
                    <h3>
                        <a id="manage" class="nav-link text-dark" href="{{ route('user.info') }}" title="Manage">{{ Auth::user()->cus_name }}</a>
                    </h3>
                    <li class="nav-item">
                        <form id="logoutForm" class="form-inline" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button id="logout" type="submit" class="nav-link btn btn-link text-dark">Logout</button>
                        </form>
                    </li>
                    @endauth
            </ul>
        </header>

    <form action="" method="POST">
        @csrf

        <div class="info-full">
        <div class="user">
            <div class="user-heading">
                <h2> THÔNG TIN TÀI KHOẢN </h3>
                <div class="line"></div>
            </div>

            <div class="user-content">
              <div class="user-name">
                <p> <strong>Họ tên: </strong> </p>
                <input type="text" class="gform" name="name" value="{{ $user->cus_name }}">
              </div>

              <div class="user-phone">
                <p> <strong>SĐT: </strong> </p>
                <input type="tel" class="gform" name="phone" value="{{ $user->cus_phone }}">
              </div>

              <div class="user-email">
                <p> <strong>Email: </strong> </p>
                <input type="email" class="gform" name="email" value="{{ $user->email }}" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px; margin-top: 10px;"></i>
              </div>

              <div class="user-birth">
                <p> <strong>Ngày sinh: </strong> </p>
                <input type="datetime-local" class="gform" name="birth" value="{{ $user->cus_dob }}">
              </div>

              <div class="user-gender">
                <p> <strong>Giới tính: </strong> </p>
                <input type="text" class="gform" name="gender" value="{{ $user->cus_gender }}">
              </div>

              <div class="user-type">
                <p> <strong>Loại thành viên: </strong> </p>
                <input type="text" class="gform" name="type" value="{{ $user->cus_type }}" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px; margin-top: 10px;"></i>
              </div>

              <div class="user-point">
                <p> <strong>Điểm tích lũy: </strong> </p>
                <input type="number" class="gform" name="point" value="{{ $user->cus_point }}" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px; margin-top: 10px;"></i>
              </div>
            </div>

            <button class="update-info" type="submit">
                THAY ĐỔI THÔNG TIN
            </button>

        </div>
    </form>

        <div class="trans">
            <div class="trans-heading">
                <h2> LỊCH SỬ GIAO DỊCH </h3>
                    <div class="line"></div>
            </div>

            <div class="trans-content">
                @foreach($bills as $bill)
                    <div class="trans-history">
                        <div class="content-heading">
                            <h3>THÔNG TIN HÓA ĐƠN</h3>
                        </div>

                        <div class="trans-bi_id">
                            <p> <strong>Mã hóa đơn: </strong> {{ $bill->bi_id }} </p>
                        </div>
                        
                        <div class="trans-bi_date">
                            <p> <strong>Ngày lập hóa đơn: </strong> {{ $bill->bi_bi_date }} </p>
                        </div>
                        
                        <div class="trans-tk_count">
                            <p> <strong>Số lượng vé đã mua: </strong> {{ $bill->tk_count }} </p>
                        </div>
                        
                        <div class="trans-bi_value">
                            <p> <strong>Tổng tiền: </strong> {{ $bill->bi_value }} </p>
                        </div>
                        
                        <div class="trans-line"></div>
                        <h4>THÔNG TIN VÉ</h4>

                        @foreach($tickets as $ticket)
                            @if($ticket->bi_id == $bill->bi_id)
                                <div class="trans-tk_id">
                                    <p> <strong>Mã vé: </strong> {{ $ticket->tk_id }}</p>
                                </div>
                                
                                <div class="trans-mv_id">
                                    <p> <strong>Phim: </strong> {{ $ticket->mv_name }}</p>
                                </div>
                                
                                <div class="trans-sl_id">
                                    <p> <strong>Mã suất chiếu: </strong> {{ $ticket->sl_id }}</p>
                                </div>
                                
                                <div class="trans-r_id">
                                    <p> <strong>Phòng chiếu: </strong> {{ $ticket->r_id }}</p>
                                </div>
                                
                                <div class="trans-tk_value">
                                    <p> <strong>Giá vé: </strong> {{ $ticket->tk_value }}</p>
                                </div>
                                
                                <div class="trans-st_id">
                                    <p> <strong>Số ghế: </strong> {{ $ticket->st_id }}</p>
                                </div>
                                
                                <div class="trans-tk_type">
                                    <p> <strong>Loại vé: </strong> {{ $ticket->tk_type }}</p>
                                </div>

                                <div class="trans-line2"></div>
                            @endif
                        @endforeach
            
                    </div>

                @endforeach 
                  
            </div>

        </div>

      </div>

          <div class="footblank"> </div>

@endsection
