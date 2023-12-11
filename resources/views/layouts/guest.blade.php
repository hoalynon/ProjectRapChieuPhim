<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cinmema') }}</title>
    
</head>

<body>

    <div>
        <header>

            <a href="#0">
                <img src="https://blog.luyencode.net/wp-content/uploads/2020/10/cd-logo.png" alt="Logo"
                    class="logo">
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


            {{-- <partial name="_LoginPartial" /> --}}
            <ul class="navbar-nav">
                <div class="validation">
                        <span class="register">
                            <a class="nav-link text-dark" id="register" href="{{ route('register') }}">Đăng ký</a>
                        </span>
            
                        <hr>
                        <span class="login">
                            <a class="nav-link text-dark" id="login" href="{{ route('login') }}">Đăng nhập</a>
                        </span>
                    </div>
                {{-- @auth
                    <li class="nav-item">
                        <a id="manage" class="nav-link text-dark" href="{{ route('profile.show') }}" title="Manage">Hello {{ Auth::user()->name }}!</a>
                    </li>
                    <li class="nav-item">
                        <form id="logoutForm" class="form-inline" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button id="logout" type="submit" class="nav-link btn btn-link text-dark">Logout</button>
                        </form>
                    </li>
                @else
                    <div class="validation">
                        <span class="register">
                            <a class="nav-link text-dark" id="register" href="{{ route('register') }}">Đăng ký</a>
                        </span>
            
                        <hr>
                        <span class="login">
                            <a class="nav-link text-dark" id="login" href="{{ route('login') }}">Đăng nhập</a>
                        </span>
                    </div>
                @endauth --}}
            </ul>

        </header>
        <div>
            <main role="main">
                {{ $slot }}
            </main>

        </div>
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

                </div>
            </div>
        </footer>

        
    </div>
</body>

</html>
