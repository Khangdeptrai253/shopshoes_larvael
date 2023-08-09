<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;

session_start();
class ProdudctController extends Controller
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
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('category')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->orderBy('brand_id', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product()
    {
        $this->AuthLogin();
        // lấy ra tất cả dữ liệu từ bảng category bằng get
        $all_product = DB::table('product')
        ->join('category','category.category_id', '=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->orderBy('product.product_id','desc')
        ->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->name_product;
        $data['product_desc'] = $request->desc;
        $data['product_status'] = $request->status;
        $data['content'] = $request->content;
        $data['price'] = $request->price;
        $data['category_id'] = $request->category;
        $data['brand_id'] = $request->brand;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products', $new_image);
            $data['image'] = $new_image;
            DB::table('product')->insert($data);
            session::put('massage','thêm sản phẩm thành công');
            return redirect('/add-product');
        }
        DB::table('product')->insert($data);
        session::put('massage', 'thêm sản phẩm thành công');
        return redirect('/add-product');
    }
    public function active_product($product_id)
    {
        DB::table('product')->where('product_id',$product_id)->update(['product_status' => 1]);
        session::put('massage', 'thay đổi trạng thái thành công');
        return redirect('/all-product');
    }
    public function unactive_product($product_id)
    {
        DB::table('product')->where('product_id',$product_id)->update(['product_status' => 0]);
        session::put('massage', 'thay đổi trạng thái thành công');
        return redirect('/all-product');
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $one_of_product = DB::table('product')->where('product_id', $product_id)->get();
        $category_product = DB::table('category')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->orderBy('brand_id', 'desc')->get();
        $manager_product = view('admin.edit_product')->with('one_of_product', $one_of_product)->with('category_product', $category_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);

    }
    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->name_product;
        $data['product_desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['price'] = $request->price;
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products', $new_image);
            $data['image'] = $new_image;
            DB::table('product')->where('product_id',$product_id)->update($data);
            session::put('massage','thêm sản phẩm thành công');
            return redirect('/all-product');
        }
        DB::table('product')->where('product_id', $product_id)->update($data);
        session::put('massage', 'cập nhật sản phẩm thành công');
        return redirect('/all-product');
    }
    public function delete_product($product_id)
    {
        $one_of_product = DB::table('product')->where('product_id', $product_id)->delete();
        session()->put('massage', 'delete success!!!');
        return redirect('/all-product');

    }
    public function detail_product($product_id){
        $cate_product = DB::table('category')->where('status','1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('status','1')->orderBy('brand_id', 'desc')->get();
        $detail_product = DB::table('product')
        ->join('category','category.category_id', '=','product.category_id')
        ->where('product.product_id',$product_id)->get();
        foreach($detail_product as $key => $value){
            $category_id = $value->category_id;
        }
        $related_product = DB::table('product')
        ->join('category','category.category_id', '=','product.category_id')
        ->where('category.category_id',$category_id)
        ->whereNotIn('product.product_id',[$product_id])
        ->get();
        return view('pages.product.detail_product')->with('cate_product',$cate_product)->with('product',$detail_product)->with('brand_name',$brand_product)->with('related_product',$related_product);
        }
}
