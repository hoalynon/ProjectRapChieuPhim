@extends('user.main')

@section('head')
  
@endsection

@section('content')

 <!-- Banner -->

        <!--Tạo header cho trang-->
        <header>
            <a href="/user/menu">
                <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo" class="logo">
            </a>
            <nav>
              <ul>
                <li>
                  <a href="#0">Phim ▾</a>
                  <ul class="dropdown">
                    <li> <a href="#1">Phim đang chiếu</a></li>
                    <li> <a href="#1">Phim sắp chiếu</a></li>
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
            
            <div class="validation">
              <span class="register">
                <a href="#0"> <b> Đăng ký </b></a>
              </span>
              <hr>
              <span class="login">
                <a href="/user/login"> <b>Đăng nhập</b></a>
              </span>
            </div>
        </header>

 <div class="body-banner">
            <div class="banner">
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b1"> <img src="/template/image/menu/1.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b2"> <img src="/template/image/menu/2.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b3"> <img src="/template/image/menu/3.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b4"> <img src="/template/image/menu/4.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b5"> <img src="/template/image/menu/5.png" alt=""> </a>
                </div>
              </div>
            </div>
          </div>

          <!--Film -->
          <div class="fl-full">
            <div class="fl-title">
              <span class="rc active"> <a href="#rc" class="f_title_rc"> <strong> PHIM ĐANG CHIẾU </strong> </a> </span>
              <span class="cm"> <a href="#cm" class="f_title_cm"> <strong> PHIM SẮP CHIẾU </strong> </a> </span>
            </div>

            <div class="body-film">
              <div class="film">
                <div class="flm rc">
                    <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f1"><img src="/template/image/menu/6.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f2"><img src="/template/image/menu/7.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f3"><img src="/template/image/menu/8.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f4"><img src="/template/image/menu/9.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f5"><img src="/template/image/menu/10.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f6"><img src="/template/image/menu/11.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f7"><img src="/template/image/menu/12.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f8"><img src="/template/image/menu/13.png" alt=""></a> 
                    </div>
                  </div>
                </div>
                
                <div class="flm cm">
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f1"><img src="/template/image/menu/10.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f2"><img src="/template/image/menu/13.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f3"><img src="/template/image/menu/8.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f4"><img src="/template/image/menu/6.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f5"><img src="/template/image/menu/11.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f6"><img src="/template/image/menu/7.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f8"><img src="/template/image/menu/13.png" alt=""></a> 
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>

          <!-- event -->
          <div class="evt-full">
            <div class="evt-title">
              <button class="event-title">
                <a href="#km" class="e-title"> 
                  <strong> CHƯƠNG TRÌNH KHUYẾN MÃI </strong>
                </a>
              </button>
            </div>
            <div class="body-event">
                <div class="event">
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e1"> <img src="/template/image/menu/14.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e2"> <img src="/template/image/menu/15.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e3"> <img src="/template/image/menu/16.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e4"> <img src="/template/image/menu/17.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e5"> <img src="/template/image/menu/18.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e6"> <img src="/template/image/menu/19.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e7"> <img src="/template/image/menu/20.png" alt=""> </a> 
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="footblank"> </div>

@endsection