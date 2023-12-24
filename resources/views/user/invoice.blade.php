{{-- @extends ('user.main')



@section('content')
    

@endsection --}}

<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <section class="booking-body">
        <div class="top-content">
            <table class="text-center">
                <tr>
                    <td>
                        <span class="form-header--unselected ">CHỌN VÉ</span>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="56" viewBox="0 0 32 56"
                            fill="none">
                            <path d="M2 54L29.2108 28.7328C29.6369 28.3372 29.6369 27.6628 29.2108 27.2672L16 15L2 2"
                                stroke="black" stroke-opacity="0.5" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </td>
                    <td>
                        <span class="form-header--selected ">THANH TOÁN</span>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="56" viewBox="0 0 32 56"
                            fill="none">
                            <path d="M2 54L29.2108 28.7328C29.6369 28.3372 29.6369 27.6628 29.2108 27.2672L16 15L2 2"
                                stroke="black" stroke-opacity="0.5" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </td>
                    <td>
                        <span class="form-header--unselected ">HOÀN TẤT</span>
                    </td>
                </tr>
            </table>
        </div>
        <!--Thông tin thanh toán-->
        <div class="container">
            <div class="left-content">
                <div class="info-filled">
                    <span>THÔNG TIN NGƯỜI NHẬN VÉ</span><br>
                    <table>
                        <tr colspan="2">
                            <td>
                                <label for="name">Họ và tên: <span class="red">*</span></label>
                                @if (Auth::check())
                                    <input id="name" type="text" class="fill" name="name"
                                        value="{{ Auth::check() ? Auth::user()->cus_name : '' }}">
                                @else
                                    <input id="name" type="text" class="fill" name="name"
                                        placeholder="Nhập họ tên">
                                @endif

                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="phone">SĐT: <span class="red">*</span></label>

                                @if (Auth::check())
                                    <input id="phone" type="text" class="fill" name="phonenum"
                                        value="{{ Auth::check() ? Auth::user()->cus_phone : '' }}">
                                @else
                                    <input id="phone" type="text" class="fill" name="phonenum"
                                        placeholder="Nhập số điện thoại">
                                @endif
                            </td>
                            <td>
                                <label for="email">Email: <span class="red">*</span></label>


                                @if (Auth::check())
                                    <input id="email" type="text" class="fill" name="email"
                                        value="{{ Auth::check() ? Auth::user()->email : '' }}" style="width: 300px;">
                                @else
                                    <input id="email" type="text" class="fill" name="email"
                                        placeholder="Nhập email của bạn" style="width: 300px;">
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="payment-method">
                    <span>HÌNH THỨC THANH TOÁN</span><br>
                    <hr>
                    <input type="radio" class="round" id="paypal" name="payment" value="paypal">
                    <i class="fa-solid fa-building-columns"></i>
                    <label for="paypal" class="payment-label">Thanh toán thông qua Paypal</label>
                    <br>

                    <input type="radio" class="round" id="vnpay" name="payment" value="vnpay">
                    <img src="images/invoice/vnpay.jpg" style="width: 20px;" alt="">
                    <label for="vnpay" class="payment-label">Thanh toán bằng VNPay</label>
                    <br>

                    <input type="radio" class="round" id="momo" name="payment" value="momo">
                    <img src="images/invoice/momo.png" style="width: 20px;" alt="">
                    <label for="momo" class="payment-label">Thanh toán trực tuyến MoMo</label>
                    <br>
                </div>
            </div>
            <div class="right-content">
                <table>
                    <thead>
                        <tr>
                            <th colspan="3" style="text-align: left;">
                                <span>THÔNG TIN NGƯỜI NHẬN VÉ</span>
                                <hr>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left"><i class="fa-solid fa-user"></i><label>Họ tên</label></td>
                            <td class="text-right"><span id="nameSpan"></span></td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="fa-solid fa-envelope"></i><label>Email</label></td>
                            <td class="text-right"><span id="emailSpan"></span></td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="fa-solid fa-phone"></i><label>Điện thoại</label></td>
                            <td class="text-right"><span id="phoneSpan"></span></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th colspan="3" style="text-align: left;">
                                <span>HÌNH THỨC THANH TOÁN</span>
                                <hr>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="pay by"></span></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: left;">
                                <span>THÔNG TIN ĐẶT VÉ</span>
                                <hr>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Ghế</td>
                            <td class="text-right">Số lượng</td>
                        </tr>
                        <tr>
                            <td class="text-left">//ghe</td>
                            <td class="text-right">//so luong</td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td><strong>Tổng cộng</strong></td>
                            <td class="text-right"><strong>
                                    <span>//tong tien</span>
                                    <span>VND</span>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit" value="submit">HOÀN TẤT</button>
            </div>
        </div>

        <div class="sbm-btn"><button type="submit" name="submit" value="submit">HOÀN TẤT</button></div>
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
                                            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSW5nqd1GUyrOltTiF7YdFAKu_SCaJ3fzTBXuv7JHmwf83C8QsO"
                                                alt="PAW Patrol: Phim Siêu Đẳng">
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
                                        <td class="label" colspan="2">{{ $movie->mv_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Suất chiếu:</td>
                                        <td> 1:00 PM </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Ngày:</td>
                                        <td>04/10/2023</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Rạp:</td>
                                        <td> 01</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="timer">
                        <span>Thời gian giữ ghế</span>
                        <span id="timer"></span>
                    </li>
                </ul>
            </div>
            <div class="format-bg-bottom"></div>
        </div>
    </section>


    <script>
        /*var inputElement = document.getElementsByName("name")[0];
            var spanElement = document.getElementById("nameSpan");*/
        window.addEventListener('DOMContentLoaded', (event) => {
            // Lấy giá trị họ tên từ người dùng đã đăng nhập
            var nameValue = document.getElementById("name").value;

            // Hiển thị giá trị họ tên trong span nameSpan
            var nameSpan = document.getElementById("nameSpan");
            nameSpan.textContent = nameValue;

            // Lấy giá trị email từ người dùng đã đăng nhập
            var emailValue = document.getElementById("email").value;

            // Hiển thị giá trị email trong span emailSpan
            var emailSpan = document.getElementById("emailSpan");
            emailSpan.textContent = emailValue;

            // Lấy giá trị số điện thoại từ người dùng đã đăng nhập
            var phoneValue = document.getElementById("phone").value;

            // Hiển thị giá trị số điện thoại trong span phoneSpan
            var phoneSpan = document.getElementById("phoneSpan");
            phoneSpan.textContent = phoneValue;
        });

        // function updateValue(event) {
        //     if (event.key === "Enter") {
        //         var inputValue = inputElement.value;
        //         spanElement.textContent = inputValue;
        //     }
        // }

        // inputElement.addEventListener("keypress", updateValue);
        // inputElement.addEventListener("keydown", updateValue);
    </script>
</x-app-layout>
