<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Coupon;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;
class CouponController extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id = session::get('admin_id');
        if ($admin_id) {
            return redirect('/dashboard');
        } else {
            return redirect('/admin')->send();
        }
    }
    public function add_coupon()
    {
        $this->AuthLogin();
        return view('admin.add_coupon');
    }
    public function all_coupon()
    {
        $this->AuthLogin();
        // lấy ra tất cả dữ liệu từ bảng coupon bằng get
        $all_coupon = Coupon::orderBy('coupon_id', 'desc')->get();
        $manager_coupon = view('admin.all_coupon')->with('all_coupon', $all_coupon);
        return view('admin_layout')->with('admin.all_coupon', $manager_coupon);
    }
    public function save_coupon(Request $requests)
    {
        $data = $requests->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['name_coupon'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_number = $data['number_coupon'];
        $coupon->coupon_func = $data['func'];
        $coupon->coupon_condition = $data['money_or_percent'];
        $coupon->save();
        // $data = array();
        // $data['brand_name'] = $request->name_brand;
        // $data['brand_desc'] = $request->desc;
        // $data['status'] = $request->status;
        // DB::table('brand_product')->insert($data);
        session::put('massage', 'thêm mã giảm giá thành công');
        return redirect('/add-coupon');
    }
    public function delete_coupon($coupon_id)
    {
        $one_of_coupon = Coupon::where('coupon_id',$coupon_id)->delete();
        session()->put('massage', 'delete success!!!');
        return redirect('/all-coupon');

    }
}
