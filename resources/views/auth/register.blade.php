<x-guest-layout>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <section class="slider">
        <div class="container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <!--Tạo khung đăng nhập-->
                    <div class="user-modal">
                        <div class="form-header">
                            <span class="form-header--selected  login">ĐĂNG NHẬP</span>
                            <span class="register">ĐĂNG KÝ</span>
                        </div>

                        <div class="register_form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf


                                <div>
                                    <label for="cus_name">Họ và tên:<span class="required"> *</span></label><br>
                                    <input id="cus_name" class="form-control" type="text" name="cus_name"
                                        :value="old('cus_name')" required autofocus autocomplete="cus_name" /><br>
                                    <x-input-error :messages="$errors->get('cus_name')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <label for="cus_phone">Số điện thoại:<span class="required"> *</span></label><br>
                                    <input id="cus_phone" class="form-control" type="tel" name="cus_phone"
                                        :value="old('cus_phone')" required autofocus autocomplete="cus_phone" /><br>
                                    <x-input-error :messages="$errors->get('cus_phone')" class="mt-2" />


                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <label for="email">Email:<span class="required"> *</span></label><br>
                                    <input id="email" class="form-control" type="email" name="email"
                                        :value="old('email')" required autocomplete="cus_name" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>


                                <div class="fthrow">
                                    <label for="cus_dob">Ngày sinh (DD/MM/YYYY):<span class="required">
                                            *</span></label>
                                    <input type="date" id="cus_dob" name="cus_dob" required />
                                    <x-input-error :messages="$errors->get('cus_dob')" class="mt-2" />

                                    <div class="gender-container">
                                        <input type="radio" class="round" id="gender-male" name="cus_gender"
                                            value="men">
                                        <label for="gender-male" class="gender-label">Nam</label>

                                        <input type="radio" class="round" id="gender-female" name="cus_gender"
                                            value="women">
                                        <label for="gender-female" class="gender-label">Nữ</label>
                                    </div>
                                </div>



                                <!-- Password -->
                                <div class="mt-4">
                                    <label for="password">Mật khẩu:<span class="required"> *</span></label> <br>
                                    <input id="password" class="form-control" type="password"
                                        name="password" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <label for="password_confirmation">Xác nhận mật khẩu:<span class="required"> *</span></label><br>
                                    <input id="password_confirmation" class="form-control" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <label for="agreelaw">Bấm ĐĂNG KÝ đồng nghĩa với việc bạn đồng ý với <span>điều khoản sử dụng</span> của chúng tôi.</label>
                                
                                <button class="submit" id="registerSubmit" type="submit">
                                    
                                    <span>ĐĂNG KÝ</span> 
                                </button>
                            </form>
    
                        </div>
                        
                    </div>
                </div>
                <!--Khung banner chương trình đang diễn ra-->
                <div class="slider-content-right">
                    <section class="wrapper">
                        <i class="fa-solid fa-arrow-left button" id="prev"></i>
                        <div class="image-container">
                            <div class="carousel">
                                <img src="images\login\login1.jpg" alt="" />
                                <img src="images\login\login2.jpg" alt="" />
                                <img src="images\login\login3.jpg" alt="" />
                            </div>
                            <i class="fa-solid fa-arrow-right button" id="next"></i>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>



