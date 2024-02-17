<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
        $backendurl = "https://backend.rapidseva.com/";
        $servicedetails = DB::table('tbl_partner_service')->select('*')->where('status',1)->where('id','=',$id)->first();
        
        
        return view('servicedetails',compact('servicedetails','backendurl'));
    }
    public function addtocart(Request $request, Product $product)
    {
        // Get the current cart from the session or create an empty array
        $cart = $request->session()->get('cart', []);

        // Add the product ID to the cart array
        $cart[] = $product->id;

        // Store the updated cart back in the session
        $request->session()->put('cart', $cart);

        // Optionally, you can redirect the user back to the product page or elsewhere
        return redirect()->back()->with('status', 'Product added to cart successfully!');
    }
}
