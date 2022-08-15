<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    // Đổ dữ liệu ra bảng
    public function getList($id){
        $this->v['getNamePro'] = product::where('id', $id)->first();
        $this->v['Product'] = product::all();
        $image = new image();
        $this->v['listImage'] = $image->loadList($id);

        return view('admin.product.image.list', $this->v);
        
    }

    // Thêm danh mục
    public function addImage(Request $request){
        $rules = [
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ];
        $messages = [
            'image1.required' => 'Vui lòng up ảnh 1!',
            'image2.required' => 'Vui lòng up ảnh 2!',
            'image3.required' => 'Vui lòng up ảnh 3!',
            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            // up ảnh
            if($request->hasFile('image1') && $request->file('image1')->isValid()) {
                $params['cols']['image1'] = $this->uploadFile($request->file('image1'));
            }

            if($request->hasFile('image2') && $request->file('image2')->isValid()) {
                $params['cols']['image2'] = $this->uploadFile($request->file('image2'));
            }

            if($request->hasFile('image3') && $request->file('image3')->isValid()) {
                $params['cols']['image3'] = $this->uploadFile($request->file('image3'));
            }

            $model = new image();
            $res = $model->saveAddI($params);
            if ($res > 0) {
                Session::flash('success', 'Thêm mới ảnh thành công!');
                return back();
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return back();
            }
        }
    }

    // Lấy dữ liệu ra bảng cập nhật ảnh
    public function getListUpdate($id){
        $model = new image();
        $this->v['Product'] = product::all();
        $this->v['obj'] = $model->loadOne($id);

        return view('admin.product.image.update', $this->v);
    }
    // Lưu Cập nhật ảnh
    public function Update($id, Request $request){
        $rules = [
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ];
        $messages = [
            'image1.required' => 'Vui lòng up ảnh 1!',
            'image2.required' => 'Vui lòng up ảnh 2!',
            'image3.required' => 'Vui lòng up ảnh 3!',
            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $method_route = 'product.image.update';
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            // up ảnh
            if($request->hasFile('image1') && $request->file('image1')->isValid()) {
                $params['cols']['image1'] = $this->uploadFile($request->file('image1'));
            }

            if($request->hasFile('image2') && $request->file('image2')->isValid()) {
                $params['cols']['image2'] = $this->uploadFile($request->file('image2'));
            }

            if($request->hasFile('image3') && $request->file('image3')->isValid()) {
                $params['cols']['image3'] = $this->uploadFile($request->file('image3'));
            }

            $model = new image();
            $obj = $model->loadOne($id);
            $params['cols']['id'] = $id;
            $res = $model->saveUpdateI($params);
            if($res == null) {
                Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
                return Redirect()->route($method_route, ['id' => $id]);
            }
            if ($res == 1) {
                Session::flash('success', 'Cập nhật ảnh có '.$obj->id .' thành công!');
                return Redirect()->route($method_route, ['id' => $id]);
            }else {
                Session::flash('error', 'Lỗi cập nhật!');
                return Redirect()->route($method_route, ['id' => $id]);
            }
        }
    }

    // xóa ảnh
    public function delete($id){

        image::destroy($id);
        Session::flash('success', 'Xóa thành công!');
        return back();
        
    }

    public function ActiveStatusImage($id){
        DB::table('image')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusImage($id){
        DB::table('image')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

     // up ảnh
     public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
