<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Bus\Dispatcher;
use App\Models\Account;
use App\Models\Customer;


class AuthController extends Controller
{
    private $acc, $cus;
    public function __construct()
    {
        $this->acc = new Account();
        $this->cus = new Customer();
    }

    public function showRegisterForm()
    {
        return view('innout.register');
    }
    public function showLoginForm()
    {
        return view('innout.login');
    }
    public function register(Request $request): RedirectResponse
    {
        // Kiểm tra dữ liệu đầu vào từ người dùng
        $validatedData = $request->validate([
            'name' => 'bail|required|string|min:5|max:255',
            'phone' => 'bail|required|string|regex:/^0\d{9}$/',
            'birth' => 'bail|required|date|before_or_equal:today',
            'email' => 'bail|required|email|unique:users|max:255',
            'password' => 'bail|required|string|min:6',
            'confirm_password' => 'required_with:password|same:password',
            'gender' => 'required|in:men,wom', // Kiểm tra giá trị gender
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'birth.required' => 'Ngày sinh không được để trống',
            'birth.date' => 'Ngày sinh không hợp lệ',
            'birth.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'Mật khẩu phải từ :min ký tự trở lên',
            'confirm_password.required_with' => 'Vui lòng nhập lại mật khẩu xác nhận',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp',
            'gender.required' => 'Giới tính không được để trống'
        ]);

        $datac = [
            'cus_name' => $request->name,
            'cus_phone' => $request->phone,
            'cus_gender' => $request->gender,
            'cus_email' => $request->email,
            'cus_dob' => $request->birth,
        ];
        $data = [
            'cus_email' => $request->email,
            'c_pass' => Hash::make($request->password),
            'c_role' => 'user'
        ];
        $this->acc->createAcc($data);
        $this->cus->createCus($datac);
        // $this->acc->save();
        // Xử lý các tác vụ khác sau khi đăng ký thành công
        // dd($request->all());


        // Chuyển hướng người dùng đến trang thành công hoặc thông báo đăng ký thành công
        return redirect('/login');
    }
    public function login(Request $request, Dispatcher $dispatcher): RedirectResponse
    {
        $request->validate([
            'mail_phone' => 'bail|required|email|max:255',
            'pw' => 'bail|required|string|min:6'
        ],[
            'mail_phone.required' => 'Email không được để trống',
            'mail_phone.email' => 'Email không đúng định dạng',
            // 'mail_phone.unique' => 'Email đã tồn tại',
            'pw.min' => 'Mật khẩu phải từ :min ký tự trở lên',
        ]);
        $emailOrPhone = $request->input('mail_phone');
        $password = $request->input('pw');
    //     $account = DB::table('account')
    //         ->where('mail_phone', $emailOrPhone)
    //         ->first();

    //     if ($account && password_verify($password, $account->password)){
    //     // Đăng nhập thành công
        
    //     $dispatcher->dispatch(function () use ($request) {
    //         // Đoạn mã trong này sẽ được thực thi sau 1 giây
    //         session()->flash('success', 'Đăng nhập thành công');
    //     })->delay(now()->addSeconds(1));

    //     return redirect('/products');
    // } else {
    //     // Đăng nhập không thành công
    //     return redirect('/login')->withInput($request->except('pw'))->withErrors(['error' => 'Thông tin đăng nhập không đúng']);
    // }
    $account = Account::where('cus_email', $emailOrPhone)->first();

        if ($account && Hash::check($password, $account->c_pass)) {
            // Đăng nhập thành công
            // $dispatcher->dispatch(function () use ($request) {
            //     // Đoạn mã trong này sẽ được thực thi sau 1 giây
            //     session()->flash('success', 'Đăng nhập thành công');
            // })->delay(now()->addSeconds(1));

            return redirect('/products')->with('success', 'Đăng nhập thành công');
        } else {
            // Đăng nhập không thành công
            // throw ValidationException::withMessages(['error' => 'Thông tin đăng nhập không đúng']);
            return redirect()->back()->withErrors(['login' => 'Email hoặc mật khẩu không đúng']);
        }
    }
}
