<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\MainController;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function getwelcome(){

        return view('welcome',[
            'movies_rc' => Movie::orderby('mv_start')
                    ->where('mv_start', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
                    ->where('mv_end', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
                    ->paginate(8),
            'movies_cm' => Movie::orderby('mv_start')
            ->whereDate('mv_start', '>', Carbon::now('Asia/Ho_Chi_Minh'))
            ->paginate(8)
        ]);
    }
    
    public function index(){
        if (Auth::id()){
            $cus_role=Auth()->user()->cus_role;

            if ($cus_role=='client'){
                return view('dashboard',[
                    'movies_rc' => Movie::orderby('mv_start')
                            ->where('mv_start', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->where('mv_end', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->paginate(8),
                    'movies_cm' => Movie::orderby('mv_start')
                    ->whereDate('mv_start', '>', Carbon::now('Asia/Ho_Chi_Minh'))
                    ->paginate(8)
                ]);
            }
            else if ($cus_role=='admin'){
                return view('admin.home', [
                    'title' => 'Trang chủ quản trị'
                ]);
            }
            else{
                return redirect()->back(); 
            }
        }
    }
    public function test()
    {
        return view("test");
    }
}
