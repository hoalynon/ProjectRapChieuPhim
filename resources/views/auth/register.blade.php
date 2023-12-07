<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        
        <div>
            <x-input-label for="cus_name" :value="__('Họ và tên:')" />
            <x-text-input id="cus_name" class="block mt-1 w-full" type="text" name="cus_name" :value="old('cus_name')" required autofocus autocomplete="cus_name" />
            <x-input-error :messages="$errors->get('cus_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cus_phone">Số điện thoại:<span class="required"> *</span></x-input-label>
            <x-text-input type="tel" id="cus_phone" class="gform" name="cus_phone" required />
            <x-input-error :messages="$errors->get('cus_phone')" class="mt-2" />
        </div>

        <div class="fthrow">
            <x-input-label for="cus_dob">Ngày sinh (DD/MM/YYYY):<span class="required"> *</span></x-input-label>
            <x-text-input type="date" id="cus_dob" name="cus_dob" required />
            <x-input-error :messages="$errors->get('cus_dob')" class="mt-2" />

            <div class="gender-container">
                <input type="radio" class="round" id="gender-male" name="cus_gender" value="men">
                <x-input-label for="gender-male" class="gender-label">Nam</x-input-label>

                <input type="radio" class="round" id="gender-female" name="cus_gender" value="women">
                <x-input-label for="gender-female" class="gender-label">Nữ</x-input-label>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<!-- Name -->
        {{-- <div>
            <x-input-label for="cus_name" :value="__('Họ và tên:')" />
            <x-text-input id="cus_name" class="block mt-1 w-full" type="text" name="cus_name" :value="old('cus_name')" required autofocus autocomplete="cus_name" />
            <x-input-error :messages="$errors->get('cus_name')" class="mt-2" />
        </div>

        <div class="mt-4">
        <x-input-label for="cus_phone">Số điện thoại:<span class="required"> *</span></label><br>
        <x-text-input type="tel" id="cus_phone" class="gform" name="cus_phone" required><br>
        <x-input-error :messages="$errors->get('cus_phone')" class="mt-2" />
        </div>

        <div class="fthrow">
            <x-input-label for="cus_dob">Ngày sinh (DD/MM/YYYY):<span class="required"> *</span></label><br>
            <input type="date" id="cus_dob" name="cus_dob" required>
            <x-input-error :messages="$errors->get('cus_dob')" class="mt-2" />


            <div class="gender-container">
                <input type="radio" class="round" id="gender-male" name="gender" value="men">
                <x-input-label for="cus_gender" class="gender-label">Nam</label>

                <input type="radio" class="round" id="gender-female" name="gender" value="wom">
                <x-input-label for="gender-female" class="gender-label">Nữ</label>
            </div><br>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}