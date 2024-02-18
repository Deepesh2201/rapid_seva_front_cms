<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function login(){
        $backendurl = "https://backend.rapidseva.com/";
        $banners = DB::table('banner')->select('*')->where('status',1)->get();
        
        return view('login',compact('backendurl','banners'));
    }
    public function loggedin(Request $request)
    {
        // Validate login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
       // Retrieve the user from the database based on the email
    $user = DB::table('tbl_user')->where('email', $request->email)->first();

    // If user exists and the password matches
    if ($user && $user->password === $request->password) {
        // Store user data and backend URL in session
        $request->session()->put('user', $user);
        $backendurl = "https://backend.rapidseva.com/";
        $request->session()->put('backendurl', $backendurl);

        return redirect()->route('index'); // Redirect to dashboard or any other page
    }
    
        // If authentication fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    function signup(){
        $backendurl = "https://backend.rapidseva.com/";
        $banners = DB::table('banner')->select('*')->where('status',1)->get();
        
        return view('signup',compact('backendurl','banners'));
    }
    function index(){
        $backendurl = "https://backend.rapidseva.com/";
        $banners = DB::table('banner')->select('*')->where('status',1)->get();
        $categories = DB::table('category')->select('*')->where('cat_status',1)->get();
        $g_subcategory = DB::table('g_subcategory')->select('*')->where('status',1)->inRandomOrder()->paginate(8);
        $g_subcategoryvid = DB::table('g_subcategory')->select('*')->where('status',1)->inRandomOrder()->paginate(3);
        
        
        return view('index',compact('backendurl','banners','categories','g_subcategory','g_subcategoryvid'));
    }

    function categories(){
        $backendurl = "https://backend.rapidseva.com/";
        $categories = DB::table('category')->select('*')->where('cat_status',1)->get();
        
        
        return view('categories',compact('categories','backendurl'));
    }

    function subcategories($id){
        $backendurl = "https://backend.rapidseva.com/";
        $g_subcategory = DB::table('g_subcategory')->select('*')->where('status',1)->where('cid','=',$id)->get();
        
        
        return view('subcategories',compact('g_subcategory','backendurl'));
    }
    function services($id){
        $backendurl = "https://backend.rapidseva.com/";
        $services = DB::table('tbl_partner_service')->select('*')->where('status',1)->where('sid','=',$id)->get();
        
        
        return view('services',compact('services','backendurl'));
    }
    function register(Request $request)
    {
        // Check if user session exists
        if (Session::has('user')) {
            // If user session exists, update user name
            $rules = [
                'fullname' => 'required|string',
            ];
    
            // Validation messages
            $messages = [
                'fullname.required' => 'Enter valid name.',
            ];
    
            // Validate the request
            $request->validate($rules, $messages);
    
            // Update user name in the database
            DB::table('tbl_user')->where('id', session('user')->id)->update(['name' => $request->fullname]);
    
            // Store a success message in the session
            $request->session()->flash('status', 'User updated successfully. Re-login to see the changes.');
    
            // Redirect back to the previous page
            return redirect()->back();
        } else {
            // If user session doesn't exist, proceed with user registration
    
            // Validation rules
            $rules = [
                'fullname' => 'required|string',
                'email' => 'required|email|unique:tbl_user,email',
                'mobile' => 'required|numeric|unique:tbl_user,mobile',
                'password' => 'required|string|min:8|confirmed',
            ];
    
            // Validation messages
            $messages = [
                'password.confirmed' => 'The password confirmation does not match.'
            ];
    
            // Validate the request
            $request->validate($rules, $messages);
    
            // If validation passes, insert the user into the database
            DB::table('tbl_user')->insert([
                'name' => $request->fullname,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
                'ccode' => '+91',
                'code' => 123456,
                'rdate' => Carbon::now()
            ]);
    
            // Return a success response
            return response()->json(['message' => 'User registered successfully'], 200);
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session data
        $request->session()->invalidate();

        // Clear session data from the current request
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

   
}
