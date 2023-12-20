<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="author" content="KT">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



    <div class="body">
        {{-- @include('common.errors') --}}
        <div class="register_form">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name">Họ và tên:<span class="required"> *</span></label><br>
                <input type="text" class="gform" name="name" value={{ old('name') }} required><br>
                @error('name')
                    <span style='color:red;'>{{ $message }}</span>
                @enderror

                <label for="phone">Số điện thoại:<span class="required"> *</span></label><br>
                <input type="tel" class="gform" name="phone" value={{ old('phone') }} required><br>
                @error('phone')
                    <span style='color:red;'>{{ $message }}</span>
                @enderror

                <label for="email">Email:<span class="required"> *</span></label><br>
                <input type="email" class="gform" name="email" value={{ old('email') }} required><br>
                @error('email')
                    <span style='color:red;'>{{ $message }}</span>
                @enderror

                <div class="fthrow">
                    <label for="birth">Ngày sinh (DD/MM/YYYY):<span class="required"> *</span></label><br>
                    <input type="date" id="birth" name="birth" required>

                    @error('birth')
                        <span style='color:red;'>{{ $message }}</span>
                    @enderror

                    <div class="gender-container">
                        <input type="radio" class="round" id="gender-male" name="gender" value="men">
                        <label for="gender-male" class="gender-label">Nam</label>

                        <input type="radio" class="round" id="gender-female" name="gender" value="wom">
                        <label for="gender-female" class="gender-label">Nữ</label>

                        @error('gender')
                            <span style='color:red;'>{{ $message }}</span>
                        @enderror
                    </div><br>
                </div>

                <label for="password">Mật khẩu:<span class="required"> *</span></label><br>
                <input type="password" class="gform" name="password" required><br>

                <label for="confirm_password">Xác nhận mật khẩu:<span class="required"> *</span></label><br>
                <input type="password" class="gform" name="confirm_password" required><br><br>

                @error('confirm_password')
                    <span style='color:red;'>{{ $message }}</span>
                @enderror

                <div class="law">
                    <input type="radio" class="round" id="agreelaw">
                    <label for="agreelaw">Tôi đồng ý với <span>điều khoản sử dụng của ABC</span></label>
                </div>
                <button type="submit" class="submit">
                    <span>ĐĂNG KÝ</span>
                </button>
                </form>
        </div><br>

        

    </div>


</body>

</html>
