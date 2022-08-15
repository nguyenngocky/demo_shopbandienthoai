<?php

namespace App\Http\Controllers;

use App\Models\config;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    public function getList($id) {
        $this->v['getNamePro'] = product::where('id', $id)->first();
        $this->v['Product'] = product::all();
        $model = new config();
        $this->v['listConfig'] = $model->loadList($id);

        return view('admin.product.config.list', $this->v);
    }

    public function addConfig(Request $request){
            $rules = [
                'config_product' => 'required',
                'price_cf' => 'required|numeric',
                'quantity' => 'required|numeric'
            ];
            $messages = [
                'config_product.required' => 'Vui lòng nhập thông tin cấu hình sản phẩm!',
                'price_cf.required' => 'Vui lòng nhập giá cấu hình sản phẩm! Nếu không có giá để là 0! ',
                'price_cf.numeric' => 'Giá cấu hình sản phẩm phải là số!',
                'quantity.required' => 'Vui lòng nhập số lượng cấu hình sản phẩm! ',
                'quantity.numeric' => 'Số lượng cấu hình sản phẩm phải là số!'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }else {
                $params = [];
                $params['cols'] = $request->post();
                
                unset($params['cols']['_token']);

                $model = new config();
                $res = $model->saveAddConfig($params);
                if($res == null) {
                    Session::flash('error', 'Vui lòng nhập dữ liệu!');
                    return back();
                }
                else if ($res > 0) {
                    Session::flash('success', 'Thêm cấu hình sản phẩm thành công!');
                    return back();
                }else {
                    Session::flash('error', 'Lỗi thêm mới!');
                    return back();
                }
            }
            
    }

    // lấy ra danh sách cấu hình sản phẩm
    public function getListUpdate($id){
        $model = new config();
        $this->v['Product'] = product::all();
        $this->v['obj'] = $model->loadOne($id);

        return view('admin.product.config.update', $this->v);
    }

    public function Update($id, Request $request) {
        $rules = [
            'config_product' => 'required',
            'price_cf' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        $messages = [
            'config_product.required' => 'Vui lòng nhập thông tin cấu hình sản phẩm!',
            'price_cf.required' => 'Vui lòng nhập giá cấu hình sản phẩm! Nếu không có giá để là 0! ',
            'price_cf.numeric' => 'Giá cấu hình sản phẩm phải là số!',
            'quantity.required' => 'Vui lòng nhập số lượng cấu hình sản phẩm! ',
            'quantity.numeric' => 'Số lượng cấu hình sản phẩm phải là số!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $method_route = 'product.config.update';
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            $model = new config();
            $obj = $model->loadOne($id);
            $params['cols']['id'] = $id;
            $res = $model->saveUpdateConfig($params);
            if($res == null) {
                Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
                return Redirect()->route($method_route, ['id' => $id]);
            }
            if ($res == 1) {
                Session::flash('success', 'Cập nhật cấu hình '.$obj->id .' thành công!');
                return Redirect()->route($method_route, ['id' => $id]);
            }else {
                Session::flash('error', 'Lỗi cập nhật!');
                return Redirect::to('/product');
            }
        }
    }

     // xóa cấu hình sản phẩm
     public function delete($id){

        config::destroy($id);
        Session::flash('success', 'Xóa cấu hình sản phẩm thành công!');
        return back();
        
    }

    public function ActiveStatusConfig($id){
        DB::table('config')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusConfig($id){
        DB::table('config')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }
}
