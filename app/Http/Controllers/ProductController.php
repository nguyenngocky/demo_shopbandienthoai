<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    private $v;
    public function __construct(){
        $this->v = [];
    }
    
    public function getList(){
        $model = new product();
        $this->v['listPro'] = $model->loadList();
        $category = new category();
        $this->v['category'] = $category->getListPro();
        // dd($category);
        return view('admin.product.list', $this->v);
    }

    // Thêm sản phẩm
    public function addProduct(ProductRequest $request){
        
            $params = [];
            $params['cols'] = $request->post();

            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            
            unset($params['cols']['_token']);

            $modelProduct = new product();
            $res = $modelProduct->saveAddPro($params);
            if($res == null) {
                Session::flash('error', 'Vui lòng nhập dữ liệu!');
                return Redirect::to('/product');
            }
            else if ($res > 0) {
                Session::flash('success', 'Thêm sản phẩm thành công!');
                return Redirect::to('/product');
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return Redirect::to('/product');
            }
    }

    // Lấy dữ liệu ra bảng cập nhật sản phẩm
    public function getListUpdate($id){
        $model = new product();
        $this->v['obj'] = $model->loadOne($id);

        return view('admin.product.update', $this->v);
    }

    // Cập nhật sản phẩm
    public function Update($id, ProductRequest $request){
        $method_route = 'product.update';
        $params = [];
        $params['cols'] = $request->post();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $modelProduct = new product();
        $obj = $modelProduct->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $modelProduct->saveUpdatePro($params);
        if($res == null) {
            Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật sản phẩm '.$obj->name .' thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect::to('/product');
        }
    }

    // xóa sản phẩm
    public function delete($id){

        product::destroy($id);
        Session::flash('success', 'Xóa sản phẩm thành công!');
        return back();
        
    }

    public function ActiveStatusPro($id){
        DB::table('product')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusPro($id){
        DB::table('product')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

     // up ảnh
     public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
