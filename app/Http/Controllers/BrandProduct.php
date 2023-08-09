<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;

session_start();

class BrandProduct extends Controller
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
    public function add_brand_product()
    {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand()
    {
        $this->AuthLogin();
        // lấy ra tất cả dữ liệu từ bảng category bằng get
        $all_brand = Brand::orderBy('brand_id', 'desc')->get();

        $manager_category = view('admin.all_brand')->with('all_brand', $all_brand);
        return view('admin_layout')->with('admin.all_brand', $manager_category);
    }
    public function save_brand(Request $request)
    {
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['name_brand'];
        $brand->brand_desc = $data['desc'];
        $brand->status = $data['status'];
        $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->name_brand;
        // $data['brand_desc'] = $request->desc;
        // $data['status'] = $request->status;
        // DB::table('brand_product')->insert($data);
        session::put('massage', 'thêm thương hiệu thành công');
        return redirect('/add-brand-product');
    }
    public function active_brand_product($brand_product_id)
    {

        // DB::table('brand_product')->where('brand_id', $brand_product_id)->update(['status' => 1]);
        $all_brand = Brand::where('brand_id',$brand_product_id)->update(['status' => 1]);
        session::put('massage', 'thay đổi trạng thái thành công');
        return redirect('/all-brand');
    }
    public function unactive_brand_product($brand_product_id)
    {
        $all_brand = Brand::where('brand_id',$brand_product_id)->update(['status' => 0]);
        session::put('massage', 'thay đổi trạng thái thành công');
        return redirect('/all-brand');
    }
    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        // $one_of_brand = DB::table('brand_product')->where('brand_id',$brand_product_id)->get();
        $one_of_brand = Brand::where('brand_id', $brand_product_id)->get();
        $manager_category = view('admin.edit_brand_product')->with('one_of_brand', $one_of_brand);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_category);

    }
    public function update_brand_product(Request $request, $category_product_id)
    {
        $data = $request->all();
        $brand = Brand::find($category_product_id);
        $brand->brand_name = $data['name_brand'];
        $brand->brand_desc = $data['desc'];
        // DB::table('brand_product')->where('brand_id', $category_product_id)->update($data);
        $brand->save();
        session::put('massage', 'update danh mục thành công');
        return redirect('/all-brand');
    }
    public function delete_brand($brand_product_id)
    {
        $one_of_brand = Brand::where('brand_id',$brand_product_id)->delete();
        session()->put('massage', 'delete success!!!');
        return redirect('/all-brand');

    }
    public function show_brand($brand_id)
    {
        $cate_product = DB::table('category')->where('status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status', '1')->orderBy('brand_id', 'desc')->get();
        $product_by_id = DB::table('product')
            ->join('brand_product', 'brand_product.brand_id', '=', 'product.brand_id')
            ->join('category', 'category.category_id', '=', 'product.category_id')
            ->where('product.brand_id', $brand_id)
            ->get();
        return view('pages.brand.show_brand')->with('cate_product', $cate_product)->with('brand_name', $brand_product)->with('product_by_brand', $product_by_id);
    }
}
