<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect('/dashboard');
        }
        else{
            return redirect('/admin')->send();
        }
    }
    public function add_cate_product(){
        $this->AuthLogin();
        return view('admin.add_cat_product');
    }
    public function all_category(){
        $this->AuthLogin();
        // lấy ra tất cả dữ liệu từ bảng category bằng get
        $all_category = DB::table('category')->get();

        $manager_category = view('admin.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category);
    }
    public function save_category(Request $request){
        $data = array();
        $data['category_name'] = $request->name_cat;
        $data['category_desc'] = $request->desc;
        $data['status'] = $request->status;
        DB::table('category')->insert($data);
        session::put('massage','thêm danh mục thành công');
        return redirect('/add-cat-product');
    }
    public function active_category_product($category_product_id){
        DB::table('category')->where('category_id',$category_product_id)->update(['status'=> 1]);
        session::put('massage','thay đổi trạng thái thành công');
        return redirect('/all-category');
    }
    public function unactive_category_product($category_product_id){
        DB::table('category')->where('category_id',$category_product_id)->update(['status'=> 0]);
        session::put('massage','thay đổi trạng thái thành công');
        return redirect('/all-category');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $one_of_category = DB::table('category')->where('category_id',$category_product_id)->get();
        $manager_category = view('admin.edit_category_product')->with('one_of_category', $one_of_category);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category);

    }
    public function update_cate_product(Request $request,$category_product_id){
        $data = array();
        $data['category_name'] = $request->name_cat;
        $data['category_desc'] = $request->desc;
        DB::table('category')->where('category_id',$category_product_id)->update($data);
        session::put('massage','update success');
        return redirect('/all-category');
    }
    public function delete_category($category_product_id){
        $one_of_category = DB::table('category')->where('category_id',$category_product_id)->delete();
        session()->put('massage','delete success!!!');
        return redirect('/all-category');


    }
    public function show_category($category_id){
        $cate_product = DB::table('category')->where('status','1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status','1')->orderBy('brand_id', 'desc')->get();
        $product_by_id = DB::table('product')
        ->join('category','category.category_id', '=','product.category_id')
        ->where('product.category_id',$category_id)->get();
        $category_name = DB::table('category')->where('category_id',$category_id)->get();
        return view('pages.category.show_category')->with('cate_product',$cate_product)->with('product',$product_by_id)->with('brand_name',$brand_product)->with('category_name',$category_name);
    }
    public function categroy_name(){
        $cate_product = DB::table('category')->where('');
    }
}
