<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function myaccount()
    {

        return view('myaccount');
    }
    public function promos()
    {
        $backendurl = "https://backend.rapidseva.com/";
        $coupons = DB::table('tbl_coupon')->select('*')->where('coupon_status', 1)->get();

        return view('promos', compact('backendurl', 'coupons'));
    }
    public function myaddress()
    {
        $addresses = DB::table('tbl_address')->select('*')->where('uid', session('user')->id)->get();
        return view('myaddress', compact('addresses'));
    }
    public function servicesdetails($id)
    {
        $backendurl = "https://backend.rapidseva.com/";
        $servicedetails = DB::table('tbl_partner_service')->select('*')->where('status', 1)->where('id', '=', $id)->first();


        return view('servicedetails', compact('servicedetails', 'backendurl'));
    }
    public function addToCart($service_id)
    {

        // Retrieve service details based on service_id using DB
        $service = DB::table('tbl_partner_service')->where('id', $service_id)->first();

        // Check if service exists
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }
        // Get current cart items from session
        $cart = Session::get('cart', []);

        // Check if the service is already in the cart
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $service->id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }

        // If the service is not already in the cart, add it
        if (!$found) {
            $cart[] = [
                'id' => $service->id,
                'name' => $service->title,
                'image' => $service->img,
                'price' => $service->price,
                'discount' => $service->discount,
                'quantity' => 1, // Start with quantity 1
            ];
        }

        // Update the cart session
        Session::put('cart', $cart);

        // Redirect back to the previous page or wherever you need
        return redirect()->back()->with('success', 'Service added to cart successfully');
    }

    public function removecart($service_id)
    {
        // Get current cart items from session
        $cart = Session::get('cart', []);
    
        // Check if the service to be removed exists in the cart
        $index = null;
        foreach ($cart as $key => $item) {
            if ($item['id'] == $service_id) {
                $index = $key;
                break;
            }
        }
    
        // If the service is found, remove it from the cart
        if (!is_null($index)) {
            unset($cart[$index]);
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Service removed from cart successfully');
        }
    
        // If the service is not found in the cart
        return redirect()->back()->with('error', 'Service not found in the cart');
    }
    

    public function buynow($service_id)
    {

        // Retrieve service details based on service_id using DB
        $service = DB::table('tbl_partner_service')->where('id', $service_id)->first();

        // Check if service exists
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }
        // Get current cart items from session
        $cart = Session::get('cart', []);

        // Check if the service is already in the cart
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $service->id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }

        // If the service is not already in the cart, add it
        if (!$found) {
            $cart[] = [
                'id' => $service->id,
                'name' => $service->title,
                'image' => $service->img,
                'price' => $service->price,
                'discount' => $service->discount,
                'quantity' => 1, // Start with quantity 1
            ];
        }

        // Update the cart session
        Session::put('cart', $cart);
        $backendurl = "https://backend.rapidseva.com/";
        // Redirect back to the previous page or wherever you need
        $coupondiscount = 0;
        return view('cart', compact('backendurl','coupondiscount'));
        
    }
    public function cart(){

        $backendurl = "https://backend.rapidseva.com/";
        $addresses = DB::table('tbl_address')->select('*')->where('uid', session('user')->id)->get();
        $coupondiscount = 0;
        return view('cart', compact('backendurl','coupondiscount','addresses'));
    }
    public function applycoupon(Request $request)
{
    $couponCode = $request->input('coupon');

    // Query the database to check if the coupon code exists and is valid
    $coupon = DB::table('tbl_coupon')->where('coupon_code', $couponCode)->where('coupon_status', 1)->first();

    if ($coupon) {
        // Coupon is valid, retrieve the discount amount
        $coupondiscount = $coupon->disc_per;
        $couponcode = $coupon->coupon_code;
        $maxdiscount = $coupon->max_disc;
        // Pass the discount amount to the view
        $backendurl = "https://backend.rapidseva.com/";
        $couponsuccess = $coupondiscount.'% discount upto ₹'.$maxdiscount;
        // Redirect back to the previous page or wherever you need
        return view('cart', compact('backendurl','coupondiscount','couponcode','maxdiscount','couponsuccess'));
    } else {
        // Coupon is not valid
        return redirect()->back()->with('couponerror', 'Invalid coupon code');
    }

}
}
