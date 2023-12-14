<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
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

                        <section>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-content">

                                <!-- Email Address -->
                                <div>
                                    <label class="input-title" for="email">Email / Số điện thoại: <span
                                            class="red">*</span></label>
                                    <input id="email" placeholder="Nhập Email " type="email" name="email"
                                        :value="old('email')" required autofocus autocomplete="cus_name" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <label class="input-title" for="password">Mật khẩu: <span class="red">*</span>
                                        </p>

                                        <input id="password" type="password" name="password"
                                            placeholder="Nhập mật khẩu " required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                {{-- <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div> --}}

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif

                                    <button id="login-submit" type="submit">ĐĂNG NHẬP</button>
                                </div>
                            </div>
                            </form>
                        </section>
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


{{-- <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label class="input-title" for="email">Email / Số điện thoại: <span class="red">*</span></label>
        <input id="email" placeholder="Nhập Email "> type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ml-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form> --}}
