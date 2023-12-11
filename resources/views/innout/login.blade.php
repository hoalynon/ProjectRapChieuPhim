<!Doctype HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!--Tạo header cho trang-->
    <header>
        <a href="#0">
            <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo" class="logo">
        </a>
        <nav>
            <ul>
                <li>
                    <a href="#0">Phim</a>
                </li>
                <li>
                    <a href="#0">Lịch chiếu</a>
                </li>
                <li>
                    <a href="#0">Đặt vé</a>
                </li>
                <li>
                    <a href="#0">Thành viên</a>
                </li>
                <li>
                    <a href="#0">Khuyến mãi</a>
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
            <span class="register">Đăng ký</span>
            <hr>
            <span class="login">Đăng nhập</span>
        </div>
    </header>

    <section class="slider">
        <div class="container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <!--Tạo khung đăng nhập-->
                    <form class="user-modal" action="{{ route('login') }}" method="POST">
                        <div class="form-header">
                            <span class="form-header--selected  login">ĐĂNG NHẬP</span>
                            <span class="register">ĐĂNG KÝ</span>
                        </div>

                        {{-- @include('common.errors') --}}
                        <div class="form-content">

                            @csrf
                            <p class="input-title">Email / Số điện thoại: <span class="red">*</span></p>
                            <input type="email" name="mail_phone" placeholder="Nhập Email ">
                            @error('mail_phone')
                                <span style='color:red;'>{{ $message }}</span>
                            @enderror

                            <p class="input-title">Mật khẩu: <span class="red">*</span></p>
                            <input type="password" name="pw" placeholder="Nhập mật khẩu ">
                            @error('pw')
                                <span style='color:red;'>{{ $message }}</span>
                            @enderror

                            @if ($errors->has('login'))
                                <span style='color:red;'>{{ $errors->first('login') }}</span>
                            @endif

                            <button type='submit'>ĐĂNG NHẬP</button> <br>
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
                                <img src="images\login1.jpg" alt="" />
                                <img src="images\login2.jpg" alt="" />
                                <img src="images\login3.jpg" alt="" />
                            </div>
                            <i class="fa-solid fa-arrow-right button" id="next"></i>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!--Thông tin Footer-->
    <footer>
        <div class="content">
            <div class="top">
                <div class="logo-details">
                    <a href="#0">
                        <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo"
                            class="logo">
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