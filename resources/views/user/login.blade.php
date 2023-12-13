@extends ('user.main')

@section('head')
    <link rel="stylesheet" href="/template/css/login.css">
@endsection

@section('content')
<section class="slider">
          <div class="container">
            <div class="slider-content">
              <div class="slider-content-left">
                <!--Tạo khung đăng nhập-->
                <form class="user-modal">
                  <div class="form-header">
                    <span class="form-header--selected  login">ĐĂNG NHẬP</span>
                    <span class="register">ĐĂNG KÝ</span>
                  </div>
      
                  <div class="form-content">
                    <p class="input-title">Email / Số điện thoại: <span class="red">*</span></p>
                    <input type="text" placeholder="Nhập Email ">
                    <p class="input-title">Mật khẩu: <span class="red">*</span></p>
                    <input type="password" name="" id="" placeholder="Nhập mật khẩu ">
                    <button>ĐĂNG NHẬP</button> <br>
                    <span class="forget-paswd">Quên mật khẩu?</span>
                  </div>
              </form>
              </div>
              <!--Khung banner chương trình đang diễn ra-->
              <div class="slider-content-right">
                <section class="wrapper">
                  <i class="fa-solid fa-arrow-left button" id="prev"></i>
                  <div class="image-container">
                    <div class="carousel">
                      <img src="/template/image/login/1.jpg" alt="" />
                      <img src="/template/image/login/2.jpg" alt="" />
                      <img src="/template/image/login/3.jpg" alt="" />
                    </div>
                    <i class="fa-solid fa-arrow-right button" id="next"></i>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
@endsection



