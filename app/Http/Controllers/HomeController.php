<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function index(){
        if (Auth::id()){
            $cus_role=Auth()->user()->cus_role;
            if ($cus_role=='client'){
                return view('dashboard');
            }
            else if ($cus_role=='admin'){
                return view('homeadmin');
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
