@extends ('user.main')

@section ('head')
    <link rel="stylesheet" href="/template/css/film-detail.css">
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
                        <a id="manage" class="nav-link text-dark" href="{{ route('profile.show') }}" title="Manage">{{ Auth::user()->cus_name }}</a>
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
        
          <div class="film-heading">
            <h2>NỘI DUNG PHIM</h2>
          </div>

          <div class="film-detail">
                <section class="detail">
                    <div class="detail-img">
                        <img src="{{$movie->mv_link_poster}}" alt="">
                    </div>

                    <div class="detail-content">
                        <h2> PHIM {{$movie->mv_name}} </h2>
                        <p> <strong> Thể loại: </strong>
                        @foreach($types as $type)
                             {{ $type->type_name }} , 
                        @endforeach
                        </p>
                        <p> <strong> Khởi chiếu: </strong> {{$movie->mv_start}}</p>                         
                        <p> <strong> Thời lượng: </strong> {{$movie->mv_duration}}</p>
                        <p> <strong> Chế độ phụ đề: </strong> {{$movie->mv_cap}}</p>
                        <p> <strong> Giới hạn tuổi: </strong> {{$movie->mv_restrict}} </p>
                        <p> <strong> Nội dung: </strong>
                          <input type="hidden" id="mydetail" value = "{{$movie->mv_detail}}">
                           <p id="moviedetail"></p>
                          </p>
                        
                        <div class="btns">
                            <a href="{{$movie->mv_link_trailer}}" clas="trailer">Xem trailer</a>
                            <a href="/user/booking/{{$movie->mv_id}}" clas="booking">Đặt vé</a>
                        </div>
                    </div>
                
                </section>
          </div>
        

          <div class="footblank"> </div>

          @endsection

@section('footer')
      <script src="/template/js/film.js"></script>
      <script>
    $(document).ready(function() {
      var textareaValue = $("#mydetail").val();
      $("#moviedetail").html(textareaValue);
    })
  </script>
@endsection
