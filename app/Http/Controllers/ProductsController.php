<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $users=DB::select('SELECT * FROM ACCOUNT');
        $cus=DB::select('SELECT * FROM CUSTOMER');
        dd($users);
        dd($cus);
        // return view('products.index');
    }
    public function about(){
        return 'This is about me';
    }
    // public function detail($productName,$id){
    //     // $mylist=[
    //     //     'name'=>'orange',
    //     //     'value'=>100,
    //     //     'number'=>5
    //     // ];
    //     // if (!array_key_exists($productName, $mylist)) {
    //     //     abort(404); // or handle the error in a different way
    //     // }
    
    //     // $products = $mylist[$productName];
    //     // return view('products.index',[
    //     //     'products'=> $products ?? 'unknown product',
    //     //     ]);
    //     return "product's id = ".$id.
    //            ",product's name= ".$productName;
    //     }
    // }
    // public function detail1($productName){
    //     // $mylist=[
    //     //     'name'=>'orange',
    //     //     'value'=>100,
    //     //     'number'=>5
    //     // ];
    //     // if (!array_key_exists($productName, $mylist)) {
    //     //     abort(404); // or handle the error in a different way
    //     // }
    
    //     // $products = $mylist[$productName];
    //     // return view('products.index',[
    //     //     'products'=> $products ?? 'unknown product',
    //     //     ]);
    //     return view('products.index', [
    //         'name' => $productName
    //     ]);
}
