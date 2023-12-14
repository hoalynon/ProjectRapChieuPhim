<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cus_name' => ['required', 'string', 'max:255','min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cus_phone' => ['required', 'string', 'max:255','regex:/^0\d{9}$/', 'unique:users'],
            'cus_dob' => ['required', 'date', 'max:255','before_or_equal:today'],
            'cus_gender' => ['required', 'string', 'max:255'],

        ],[
            'cus_name.required' => 'Họ và tên không được để trống',
            'cus_name.min' => 'Họ và tên phải từ :min ký tự trở lên',

            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',

            'password.required' => 'Mật khẩu không được để trống',
    'password.confirmed' => 'Mật khẩu không khớp với xác nhận mật khẩu',

            'cus_phone.required' => 'Số điện thoại không được để trống',
    'cus_phone.regex' => 'Số điện thoại không hợp lệ',
    'cus_phone.unique' => 'Số điện thoại đã được sử dụng',

            'cus_dob.required' => 'Ngày sinh không được để trống',
            'cus_dob.date' => 'Ngày sinh không hợp lệ',
            'cus_dob.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại',
        ]);

        $user = User::create([
            'cus_name' => $request->cus_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cus_phone' => $request->cus_phone,
            'cus_dob' => $request->cus_dob,
            'cus_gender' => $request->cus_gender,
            'cus_role' => 'client',
            'cus_point' => 0,
            'cus_type'=>'membership',
        ]);

        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            // return redirect(RouteServiceProvider::HOME);
            return redirect()->route('verification.notice');
        } else {
            return redirect()->back()->withInput()->withErrors(['registration_error' => 'Đăng ký không thành công. Vui lòng thử lại.']);
        }
    }
}
