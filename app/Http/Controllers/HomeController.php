<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $backendurl = "https://backend.rapidseva.com/";
        $banners = DB::table('banner')->select('*')->where('status',1)->get();
        $categories = DB::table('category')->select('*')->where('cat_status',1)->get();
        $g_subcategory = DB::table('g_subcategory')->select('*')->where('status',1)->inRandomOrder()->paginate(8);
        $g_subcategoryvid = DB::table('g_subcategory')->select('*')->where('status',1)->inRandomOrder()->paginate(3);
        
        
        return view('index',compact('backendurl','banners','categories','g_subcategory','g_subcategoryvid'));
    }
}
