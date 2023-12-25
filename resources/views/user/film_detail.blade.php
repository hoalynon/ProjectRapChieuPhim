@extends ('user.main')

@section ('head')
    <link rel="stylesheet" href="/template/css/film-detail.css">
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
        
          <div class="film-heading">
            <h2>NỘI DUNG PHIM</h2>
          </div>

          <div class="film-detail">
                <section class="detail">
                    <div class="detail-img">
                        <img src="{{$movie->mv_link_poster}}" alt="">
                    </div>

                    <div class="detail-content">
                        <h2> {{$movie->mv_name}} </h2>
                        <p> <strong> Thể loại: </strong>
                            <?php
                                      $count = count($types);
                                      $index = 0;
                            ?>
                              @foreach ($types as $type)
                                  {{ $type->type_name }}@if (++$index !== $count)
                                      ,
                                  @endif
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
                            <a href="/user/booking/{{$movie->mv_id}}" clas="booking">Đặt vé</a>
                        </div>
                    </div>
                
                </section>
          </div>
        

          <!-- trailer-->
          <div class="film-trailer">
            <video width="60%" height="60%" controls>
              <source src="{{$movie->mv_link_trailer}}" type="video/mp4" frameborder="0" allowfullscreen>
          </video>
          </div>

          <!-- film đang chiếu liên quan -->
          <div class="film-rela">
            <div class="film-rela-title">
              <button class="rela-title">
                <a href="/user/film_rc" class="r-title"> 
                  <strong> PHIM ĐANG CHIẾU </strong>
                </a>
              </button>
            </div>
            <div class="film-rc">
                <div class="film"> 
                @foreach($movies as $movie2)

                <div class="film-slider">
                  <div class="film-img"> 
                    <a href="/user/film_detail/{{$movie2->mv_id}}"> <img src="{{$movie2->mv_link_poster}}" alt=""> </a> 
                  </div>
                </div>

                @endforeach
              </div>
            </div>
          </div>
        

          <button class="backtop">         
            <a href="#top"><i class="fa-solid fa-arrow-up fa-2x"></i></a>
          </button>
        

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

      <script>
    $(document).ready(function() {
      var textareaValue = $("#mydetail").val();
      $("#moviedetail").html(textareaValue);
    })
  </script>
@endsection
