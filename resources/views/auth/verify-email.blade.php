<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="mb-4 text-sm text-gray-600">
        
        {{ __('Đăng ký tài khoản thành công. Chúng tôi vừa gửi cho bạn một email xác nhận tài khoản, hãy bấm vào link xác nhận email đó trước khi có thể đăng nhập và tận hưởng quyền lợi thành viên của WCINEMA nhé!') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
