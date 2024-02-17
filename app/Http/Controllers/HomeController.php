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
}
