
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
          <script src="/template/js/menu.js"></script>

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
                <a href="/user/menu">
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
      

@yield('footer')