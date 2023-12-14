<!Doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <title>Cinema</title>
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
          />
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    </head>
    <body>
        <!--Tạo header cho trang-->
        <header>
            <a href="http://127.0.0.1:5500/menu/menu.html">
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
                <a href="http://127.0.0.1:5500/login/login.html"> <b>Đăng nhập</b></a>
              </span>
            </div>
        </header>
        
          <!-- Banner -->
          <div class="body-banner">
            <div class="banner">
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b1"> <img src="img_dashboard/1.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b2"> <img src="img_dashboard/2.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b3"> <img src="img_dashboard/3.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b4"> <img src="img_dashboard/4.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b5"> <img src="img_dashboard/5.png" alt=""> </a>
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
                      <a href="#f1"><img src="img_dashboard/6.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f2"><img src="img_dashboard/7.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f3"><img src="img_dashboard/8.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f4"><img src="img_dashboard/9.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f5"><img src="img_dashboard/10.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f6"><img src="img_dashboard/11.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f7"><img src="img_dashboard/12.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f8"><img src="img_dashboard/13.png" alt=""></a> 
                    </div>
                  </div>
                </div>
                
                <div class="flm cm">
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f1"><img src="img_dashboard/10.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f2"><img src="img_dashboard/13.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f3"><img src="img_dashboard/8.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f4"><img src="img_dashboard/6.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f5"><img src="img_dashboard/11.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f6"><img src="img_dashboard/7.png" alt=""></a> 
                    </div>
                  </div>
                  <div class="film-slider">
                    <div class="film-img"> 
                      <a href="#f8"><img src="img_dashboard/13.png" alt=""></a> 
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
                    <a href="#e1"> <img src="img_dashboard/14.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e2"> <img src="img_dashboard/15.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e3"> <img src="img_dashboard/16.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e4"> <img src="img_dashboard/17.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e5"> <img src="img_dashboard/18.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e6"> <img src="img_dashboard/19.png" alt=""> </a> 
                  </div>
                </div>
                <div class="event-slider">
                  <div class="event-img"> 
                    <a href="#e7"> <img src="img_dashboard/20.png" alt=""> </a> 
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="footblank"> </div>

          <!-- java -->
        <script
          type="text/javascript"
          src="https://code.jquery.com/jquery-1.11.0.min.js"
        ></script>
        <script
          type="text/javascript"
          src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
        ></script>
        <script
          type="text/javascript"
          src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>
        <script src="{{ asset('js/menu.js') }}"></script>
        <script>
            let rc = document.querySelector('.fl-title .rc');
            let cm = document.querySelector('.fl-title .cm');
            let rcFilm = document.querySelectorAll('.body-film .film .rc');
            let cmFilm = document.querySelectorAll('.body-film .film .cm');
            
            cm.onclick = () =>{
              cm.classList.add('active');
              rc.classList.remove('active');
            
              rcFilm.forEach(rc =>{ rc.style.display = 'none' });
              cmFilm.forEach(cm =>{ cm.style.display = 'block' });
            };
            
            rc.onclick = () =>{
              cm.classList.remove('active');
              rc.classList.add('active');
            
              rcFilm.forEach(rc =>{ rc.style.display = 'block' });
              cmFilm.forEach(cm =>{ cm.style.display = 'none' });
            };
            
            </script>

        <!--Thông tin Footer-->
      <footer>
          <div class="content">
            <div class="top">
              <div class="logo-details">
                <a href="http://127.0.0.1:5500/menu/menu.html">
                  <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo" class="logo">
              </a>
              </div>
              <div class="media-icons">
                <a href="#0"><i class="fa-brands fa-facebook"></i></a>             
                <a href="#0"><i class="fa-brands fa-instagram"></i></a>
                <a href="#0"><i class="fa-brands fa-youtube"></i></a>
              </div>
            </div>

            <div class="bottom">
              <div class="link-boxes">
                <h4>THÔNG TIN</h4>
                <ul class="box">
                  <li><a href="#0">Giới thiệu</a></li>
                  <li><a href="#0">Tin tức</a></li>
                  <li><a href="#0">Hỏi & Đáp</a></li>
                  <li><a href="#0">Liên hệ</a></li>
                </ul>
              </div>
              <div class="link-boxes">
                <h4>CINEMA</h4>
                <ul class="box">
                  <li><a href="#0">Phim đang chiếu</a></li>
                  <li><a href="#0">Phim sắp chiếu</a></li>
                  <li><a href="#0">Lịch chiếu</a></li>
                  <li><a href="#0">Khuyến mại</a></li>
                </ul>
              </div>
              <div class="link-boxes">
                <h4>ĐIỀU KHOẢN SỬ DỤNG</h4>
                <ul class="box">
                  <li><a href="#0">Điều khoản chung</a></li>
                  <li><a href="#0">Điều khoản giao dịch</a></li>
                  <li><a href="#0">Chính sách thanh toán</a></li>
                  <li><a href="#0">Chính sách bảo mật</a></li>
                </ul>
              </div>
              <div class="link-boxes">
                <h4>CHĂM SÓC KHÁCH HÀNG</h4>
                <ul class="box">
                  <li><a href="#0">Hotline: </a></li>
                  <li><a href="#0">Giờ làm việc: </a></li>
                  <li><a href="#0">Địa chỉ: </a></li>
                  <li><a href="#0">Email hỗ trợ: </a></li>
                </ul>
              </div>
              <!-- <div class="link-boxes">
                <h4>PHƯƠNG THỨC THANH TOÁN</h4>
                <ul class="box">
                  <li><a href="#0">//Ngân hàng</a></li>
                  <li><a href="#0">//momo</a></li>
                </ul>
              </div>-->
            </div>
          </div>
      </footer>        
    </body>
</html>
