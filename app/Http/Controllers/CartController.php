<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Coupon;

class CartController extends Controller
{
    //
    // public function add_cart(Request $request){
    //     $productid = $request->productid_hidden;
    //     $quantity  = $request->quantity;
    //     $product = DB::table('product')->where('product_id',$productid)->get();
    //     $cate_product = DB::table('category')->where('status','1')->orderBy('category_id', 'desc')->get();
    //     $brand_product = DB::table('brand_product')->where('status','1')->orderBy('brand_id', 'desc')->get();
    //     echo '<pre>';
    //     print_r($product);
    //     echo '</pre>';
    //     return view('pages.cart.show_cart')->with('cate_product',$cate_product);
    // }
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['enter_code'])->first();
        if ($coupon) {
            $coupon_count = $coupon->count();
            if ($coupon_count > 0) {
                $counpon_session = session::get('coupon');
                if ($counpon_session == true) {
                    $is_available = 0;
                    if ($is_available == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_func' => $coupon->coupon_func
                        );
                        session()->put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_func' => $coupon->coupon_func
                    );
                    session()->put('coupon', $cou);
                }
                session()->save();
                return redirect()->back()->with('massage', 'Áp Dụng Mã Thành Công');
            }
        } else {
            return redirect()->back()->with('unvalid', 'Mã Không Tồn Tại Hoặc Sai');
        }
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }
    public function cart(Request $request)
    {
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng ajax";
        $meta_title = "Giỏ hàng ajax";
        $url_canonical = $request->url();
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.cart.cart_ajax')->with('brand_product', $brand_product)->with('cate_product', $cate_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }
    public function del_product($session_id)
    {
        $cart = session()->get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('massage', 'bạn đã xóa thành công');
        } else {
            return redirect()->back()->with('massage', 'bạn xóa không thành công');
        }
    }
    public function del_coupon()
    {
        $coupon = session::get('coupon');
        if ($coupon == true) {
            session::forget('coupon');
            return redirect()->back()->with('massage', 'bạn thành công');
        }
    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('massage', 'bạn đã cập nhật thành công');
        } else {
            return redirect()->back()->with('massage', 'bạn đã cập nhật không thành công');
        }

    }
    public function delete_all_cart()
    {
        $cart = session::get('cart');
        if ($cart == true) {
            session::forget('cart');
            session::forget('coupon');

            return redirect()->back()->with('massage', 'bạn đã xóa thành công');
        }
    }
}
