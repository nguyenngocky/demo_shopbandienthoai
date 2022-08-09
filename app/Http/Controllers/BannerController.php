<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }
    
    public function getList(){
        $model = new banner();
        $this->v['listBanner'] = $model->loadList();

        return view('admin.banner.list', $this->v);
    }

    // Thêm sản phẩm
    public function addBanner(Request $request){

        $rules = [
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ];
        $messages = [
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'desc.required' => 'Vui lòng nhập mô tả! ',
            'image.required' => 'Vui lòng up ảnh!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {

            $params = [];
            $params['cols'] = $request->post();

            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            
            unset($params['cols']['_token']);

            $model= new banner();
            $res = $model->saveAddBanner($params);
            if($res == null) {
                Session::flash('error', 'Vui lòng nhập dữ liệu!');
                return Redirect::to('/banner');
            }
            else if ($res > 0) {
                Session::flash('success', 'Thêm thành công!');
                return Redirect::to('/banner');
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return Redirect::to('/banner');
            }

        }
        
    }

    // // Lấy dữ liệu ra bảng cập nhật sản phẩm
    // public function getListUpdate($id){
    //     $model = new product();
    //     $this->v['obj'] = $model->loadOne($id);

    //     return view('admin.product.update', $this->v);
    // }

    // // Cập nhật sản phẩm
    // public function Update($id, ProductRequest $request){
    //     $method_route = 'product.update';
    //     $params = [];
    //     $params['cols'] = $request->post();

    //     if($request->hasFile('image') && $request->file('image')->isValid()) {
    //         $params['cols']['image'] = $this->uploadFile($request->file('image'));
    //     }

    //     unset($params['cols']['_token']);
    //     $modelProduct = new product();
    //     $obj = $modelProduct->loadOne($id);
    //     $params['cols']['id'] = $id;
    //     $res = $modelProduct->saveUpdatePro($params);
    //     if($res == null) {
    //         Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
    //         return Redirect()->route($method_route, ['id' => $id]);
    //     }
    //     if ($res == 1) {
    //         Session::flash('success', 'Cập nhật sản phẩm '.$obj->name .' thành công!');
    //         return Redirect()->route($method_route, ['id' => $id]);
    //     }else {
    //         Session::flash('error', 'Lỗi cập nhật!');
    //         return Redirect::to('/product');
    //     }
    // }

    // xóa banner
    public function delete($id){

        banner::destroy($id);
        Session::flash('success', 'Xóa thành công!');
        return back();
        
    }

    public function ActiveStatusBanner($id){
        DB::table('product')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusBanner($id){
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
