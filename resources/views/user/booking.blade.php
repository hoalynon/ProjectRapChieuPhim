@extends ('user.main')

@section ('head')
    <link rel="stylesheet" href="/template/css/booking.css">

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

      <form method="POST" action="/user/invoice">
         <!--Đặt vé-->
         <section class="booking-body">
          <div class="top-content">
            <table class="text-center">
              <tr>
              <td>
                <span style="color: #29b1f0; font-weight: bold">CHỌN VÉ</span>
              </td>
              <td>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="56" viewBox="0 0 32 56" fill="none">
                  <path d="M2 54L29.2108 28.7328C29.6369 28.3372 29.6369 27.6628 29.2108 27.2672L16 15L2 2" stroke="black" stroke-opacity="0.5" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </td>
              <td>
                <span>THANH TOÁN</span>
              </td>
              <td>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="56" viewBox="0 0 32 56" fill="none">
                  <path d="M2 54L29.2108 28.7328C29.6369 28.3372 29.6369 27.6628 29.2108 27.2672L16 15L2 2" stroke="black" stroke-opacity="0.5" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </td>
              <td> 
                <span>HOÀN TẤT</span>
              </td>
            </tr>
            </table>
          </div>
          <div class="container">
            <div class="left-content">
              <div class="seat-map">
                <div class="screen">
                  <h3>MÀN HÌNH</h3>
                </div>
                <div class="all-seats" id="allseat">

                </div>
                <div class="noctice">
                  <div class="iconlist1">
                    <div class="zone-standard">
                      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="43" viewBox="0 0 33 43" fill="none">
                        <rect width="33" height="43" rx="3" fill="black" fill-opacity="0.25"/>
                      </svg>
                      <span>Standard</span>
                    </div>
                    <div class="zone-vip">
                      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="43" viewBox="0 0 33 43" fill="none">
                        <rect width="33" height="43" rx="3" fill="#5B131A" fill-opacity="0.61"/>
                      </svg>
                      <span>VIP </span>
                    </div>
                    <div class="zone-sweetbox">
                      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="43" viewBox="0 0 33 43" fill="none">
                        <rect width="33" height="43" rx="3" fill="#141E46" fill-opacity="0.67"/>
                      </svg>
                      <span>Sweetbox</span>
                    </div>
                  </div>
                  <div class="iconlist2">
                    <div class="checked">
                      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="43" viewBox="0 0 33 43" fill="none">
                        <rect width="33" height="43" rx="3" fill="#65B119"/>
                      </svg>
                      <span>Ghế đang chọn</span>
                    </div>
                    <div class="unavailable">
                      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="43" viewBox="0 0 33 43" fill="none">
                        <rect width="33" height="43" rx="3" fill="#D80032"/>
                      </svg>
                      <span>Ghế đã đặt</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="showtime">
              <div class="date" style="padding:30px;">
                  <h4>DANH SÁCH SUẤT CHIẾU</h4>
                  <div class="showtime-container" style="padding:10px;">
                    <select class="listslot" id="listslot" data-selected="">
                        @foreach ($slots as $slot)
                                <option value="{{ $slot->sl_id}}">
                                    {{ $slot->sl_id}}
                                </option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!--
                <div class="date">
                  <h4>NGÀY</h4>
                  <div class="showtime-container">
                    <label>
                      <input type="radio" name="dates" checked="checked" />
                      <span class="date">01/10</span>
                    </label>
                    <label>
                      <input type="radio" name="dates" />
                      <span class="date">02/10</span>
                    </label>
                    <label>
                      <input type="radio" name="dates" />
                      <span class="date">03/10</span>
                    </label>
                    <label>
                      <input type="radio" name="dates" />
                      <span class="date">04/10</span>
                    </label>
                  </div>
                </div>
                <div class="time">
                  <h4>THỜI GIAN</h4>
                  <div class="showtime-container">
                  <label>
                      <input type="radio" name="times" checked="checked" />
                      <span class="date">10:30 AM</span>
                    </label>
                    <label>
                      <input type="radio" name="times" />
                      <span class="date">01:00 PM</span>
                    </label>
                    <label>
                      <input type="radio" name="times" />
                      <span class="date">03:00 PM</span>
                    </label>
                    <label>
                      <input type="radio" name="times" />
                      <span class="date">05:00 PM</span>
                    </label>
                  </div>
                </div>
              </div>
              -->


            </div>
            <div class="right-content">
              <div class="info">
                <div class="ticket-info">
                  <div class="ticket-info1"> 
                    <p class="ticket-info-heading">THÔNG TIN ĐẶT VÉ</p>
                  </div>
                  <div class="ticket-info2">
                    <div class="line"></div>
                  </div>
                  <div class="ticket-info3">
                    <p class="seat-selection-text">Vui lòng chọn ghế</p>
                  </div>
                </div>
                <div class="total">
                  <p class="total-amount">Tổng cộng</p>
                  <p class="total-amount">
                    <div class="amount">
                      0
                    </div>
                     VND
                  </p>
                </div>
                <div class="nextbtn">
                  <button type="submit" >TIẾP TỤC</button>
                </div>
              </div>
            </div>
          </div>
          <div class="bottom-content">
            <div class="format-bg-top"></div>
            <div class="minicart-wrapper">
              <ul>
                <li class="item first">
                  <div class="product-detail">
                    <table class="info-wrapper">
                      <tbody>
                        <tr>
                          <td>
                            <img src="{{ $movie->mv_link_poster }}" alt="">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </li>
                <li class="item">
                  <div class="product-detail">
                    <table class="info-wrapper">
                      <tbody>
                        <tr>
                          <td class="label" colspan="2">{{ $movie->mv_name }}</td>
                        </tr>
                        <tr>
                          <td class="label">Suất chiếu:</td>
                          <td> <div id="time"></div></td>
                        </tr>
                        <tr>
                          <td class="label">Ngày:</td>
                          <td><div id="date"></div></td>
                        </tr>
                        <tr>
                          <td class="label">Phòng chiếu:</td>
                          <td> <div id="room"></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </li>
                <li></li>
              </ul>
            </div>
            <div class="format-bg-bottom"></div>
          </div>
        </section>

        <input type="hidden" value="70000" id="baseprice">
        <input type="hiden" id="hiddenslot" name="slot">
        <input type="hiden" id="hiddenroom" name="room">
        <input type="hiden" id="hiddenmovieid" name="movieid" value="{{ $movie->mv_id }}">
        <input type="hiden" id="hiddentotalpay" name="totalpay" value="0">
        @csrf
</form>

@endsection

@section('footer')
      <script src="/template/js/booking.js"></script>
@endsection