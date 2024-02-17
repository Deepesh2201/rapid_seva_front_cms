<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function myaccount(){

        return view('myaccount');
    }
    public function promos(){
        $backendurl = "https://backend.rapidseva.com/";
        $coupons = DB::table('tbl_coupon')->select('*')->where('coupon_status',1)->get();
        
        return view('promos',compact('backendurl','coupons'));
    }
    public function myaddress(){
        $addresses = DB::table('tbl_address')->select('*')->where('uid',session('user')->id)->get();
        return view('myaddress',compact('addresses'));
    }
    public function servicesdetails($id){

        return view('servicedetails');
    }
}
