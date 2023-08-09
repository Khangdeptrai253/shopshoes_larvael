<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    //
    public function index(){
        $cate_product = DB::table('category')->where('status','1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status','1')->orderBy('brand_id', 'desc')->get();
        $product = DB::table('product')->where('product_status','1')->orderBy('product_id', 'desc')->limit(4)->get();
        return view('pages.home')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$product);
    }

    public function search_product(Request $request){
        $key_word = $request->key_word;
        $cate_product = DB::table('category')->where('status','1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status','1')->orderBy('brand_id', 'desc')->get();
        $search_product = DB::table('product')->where('product_name','like','%'. $key_word.'%')->get();
        return view('pages.product.search')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('search_product',$search_product);

    }
    public function categroy(){
        return view('pages.women');
    }
    public function man(){
        return view('pages.man');
    }
}
