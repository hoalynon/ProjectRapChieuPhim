

<x-guest-layout>
    <link
              rel="stylesheet"
              type="text/css"
              href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
            />
            <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
          
           <!-- Banner -->
           <div class="body-banner">
              <div class="banner">
                <div class="banner-slider">
                  <div class="banner-img"> 
                    <a href="#b1"> <img src="images\dashboard\1.png" alt=""> </a>
                  </div>
                </div>
                <div class="banner-slider">
                  <div class="banner-img"> 
                    <a href="#b2"> <img src="images\dashboard\2.png" alt=""> </a>
                  </div>
                </div>
                <div class="banner-slider">
                  <div class="banner-img"> 
                    <a href="#b3"> <img src="images\dashboard\3.png" alt=""> </a>
                  </div>
                </div>
                <div class="banner-slider">
                  <div class="banner-img"> 
                    <a href="#b4"> <img src="images\dashboard\4.png" alt=""> </a>
                  </div>
                </div>
                <div class="banner-slider">
                  <div class="banner-img"> 
                    <a href="#b5"> <img src="images\dashboard\5.png" alt=""> </a>
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
                        @foreach($movies_rc as $movie)
                          <div class="film-slider">
                            <div class="film-img"> 
                              <a href="/user/film_detail/{{$movie->mv_id}}"><img src="{{$movie->mv_link_poster}}" alt=""></a> 
                            </div>
                          </div>
                        @endforeach
                      </div>
                      <div class="flm cm">
                        @foreach($movies_cm as $movie)
                          <div class="film-slider">
                              <div class="film-img"> 
                                <a href="/user/film_detail/{{$movie->mv_id}}"><img src="{{$movie->mv_link_poster}}" alt=""></a> 
                              </div>
                          </div>
                        @endforeach
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
                      <a href="#e1"> <img src="images\dashboard\14.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e2"> <img src="images\dashboard\15.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e3"> <img src="images\dashboard\16.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e4"> <img src="images\dashboard\17.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e5"> <img src="images\dashboard\18.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e6"> <img src="images\dashboard\19.png" alt=""> </a> 
                    </div>
                  </div>
                  <div class="event-slider">
                    <div class="event-img"> 
                      <a href="#e7"> <img src="images\dashboard\20.png" alt=""> </a> 
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
  
  
  
  </x-guest-layout>