@extends ('user.main')

@section ('head')
    <link rel="stylesheet" href="/template/css/film.css">
@endsection

@section ('content')

<header>
            <a href="/home">
                <img src="/template/image/logo.png" alt="Logo" class="logo">
            </a>
             
            <input type="checkbox" id="menu">
            <label for="menu"> 
                <i class="fa-solid fa-bars"></i></label>
            <nav> 
                <ul>
                  <li>
                    <a href="#0">Phim▾</a>
                    <ul class="dropdown">
                      <li> <a href="/user/film_rc">Phim đang chiếu</a></li>
                      <li> <a href="/user/film_cm">Phim sắp chiếu</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#0">Thành viên▾</a>
                    <ul class="dropdown">
                      <li> <a href="/user/info">Tài khoản thành viên</a></li>
                      <li> <a href="/membership">Quyền lợi</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/event">Khuyến mãi</a>
                  </li>
                  <li>
                    <a href="#0">Giới thiệu▾</a>
                    <ul class="dropdown">
                      <li> <a href="/about_us">Về chúng tôi</a></li>
                      <li> <a href="/rule">Các quy định</a></li>
                      <li> <a href="/term">Các điều khoản</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/contact">Liên hệ</a>
                  </li>
              </ul>
              
            </nav>
            
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
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </li>
                    @endauth
            </ul>

            
        </header>           

        <button class="backtop">         
          <a href="#top"><i class="fa-solid fa-arrow-up fa-2x"></i></a>
        </button>
        
          <!----------------- Banner ------------->
          <div class="body-banner">
            <div class="banner">
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b1"> <img src="/template/image/film/1.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b2"> <img src="/template/image/film/2.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b3"> <img src="/template/image/film/3.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b4"> <img src="/template/image/film/4.png" alt=""> </a>
                </div>
              </div>
              <div class="banner-slider">
                <div class="banner-img"> 
                  <a href="#b5"> <img src="/template/image/film/5.png" alt=""> </a>
                </div>
              </div>
            </div>
          </div>

          <!-----------------Film --------------------->
         <div class="film-heading">
            <h2>PHIM SẮP CHIẾU</h2>

            <div class="film-link">
              <a href="/user/film_rc">PHIM ĐANG CHIẾU</a>
            </div>
         </div>

         <section id="film-list">
            @foreach($movies as $movie)
              <div class="film-box">
                <!-- img -->
                <div class="film-img">
                  <div class="rating"> {{$movie->mv_restrict}}    </div>
                  <img src="{{$movie->mv_link_poster}}" alt="">
                </div>

                <!-- text -->
                  <a href="/user/film_detail/{{$movie->mv_id}}">
                    <strong> {{$movie->mv_name}} </strong>
                  </a>
              </div> 
            @endforeach     
          
          </section>

          <!-- button -->
          <!-- <div class="btns">
            <a href="#">Previous</a>
            <a href="#">Next</a>
          </div> -->

          <div class="footblank"> </div>

@endsection

@section('footer')
      <script src="/template/js/film.js"></script>

      <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
        <!-- java banner -->
        <script  >    
                $(document).ready(function(){
                $(".banner").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                });
            });
        </script>

        <!-- java film -->
        <script>
          $(document).ready(function(){
    
    $(".film").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        prevArrow:"<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",

        responsive: [
          {
            breakpoint: 1201,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 801,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 601,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 501,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          }
        ]
    
      });
  });

        </script>
@endsection
