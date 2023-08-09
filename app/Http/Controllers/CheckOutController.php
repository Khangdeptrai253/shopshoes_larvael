<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Fee;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;

session_start();
class CheckOutController extends Controller
{
    //
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output .= '<option>-----Quận Huyện----- </option>';
                foreach($select_province as $key=>$province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name.' </option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output .= '<option>-----Xã Phường Thị Trấn-----</option>';
                foreach($select_wards as $key=>$wards){
                    $output .= '<option value="'.$wards->xaid.'">'.$wards->name.' </option>';
                }
            }
        }
        echo $output;

    }
    public function register()
    {
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.login_checkout')->with('brand_product', $brand_product)->with('cate_product', $cate_product);
    }
    public function login_checkout()
    {
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.login')->with('brand_product', $brand_product)->with('cate_product', $cate_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->username;
        $data['customer_mail'] = $request->email;
        $data['customer_password'] = md5($request->password);
        $data['customer_phone'] = $request->phone;
        $customer_id = DB::table('customer')->insertGetId($data);
        session::put('customer_id',$customer_id);
        session::put('customer_name', $request->customer_name);
        return redirect('/check-out');
    }
    public function place_order(Request $request){
        // insert payment
    }
    public function check_out()
    {
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        $city = City::orderby('matp','asc')->get();
        return view('pages.checkout.checkout')->with('brand_product', $brand_product)->with('cate_product', $cate_product)->with(compact('city'));
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->name;
        $data['shipping_email'] = $request->email;
        $data['shipping_address'] = $request->address;
        $data['shipping_phone'] = $request->phone;
        $data['shipping_note'] = $request->note;
        $shipping_id = DB::table('shipping')->insertGetId($data);
        session::put('shipping_id',$shipping_id);
        return redirect('/payment');
    }
    public function caculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Fee::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_maxaptt',$data['xaid'])->get();
            foreach($feeship as $key=>$fee){
                session::put('feeship',$fee->fee_ship);
                session::save();
            }
        }
    }
    public function delete_feeship()
    {
            session::forget('feeship');
            return redirect()->back();
    }
    public function payment(){
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('brand_product', $brand_product)->with('cate_product', $cate_product);

    }
    public function logout_checkout(){
        session::flush();
       return redirect('/homepage');

    }
    public function login_customer(Request $request)
    {
        $email = $request->username;
        $password = md5($request->password);
        $result = DB::table('customer')->where('customer_mail',$email)->where('customer_password',$password)->first();
        if($result){
            session::put('customer_id',$result->customer_id);
            return redirect('/check-out');
        }else{
            return redirect('/login-checkout');
        }


    }
}
