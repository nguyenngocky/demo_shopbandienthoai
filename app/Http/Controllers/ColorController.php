<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    public function getList($id) {
        $this->v['getNamePro'] = product::where('id', $id)->first();
        $this->v['Product'] = product::all();
        $model = new color();
        $this->v['listColor'] = $model->loadList($id);

        return view('admin.product.color.list', $this->v);
    }

    public function addConfig(Request $request){
            $rules = [
                'name' => 'required',
                'color_code' => 'required',
                'price_cl' => 'required|numeric'
            ];
            $messages = [
                'name.required' => 'Vui lòng nhập tên màu sản phẩm!',
                'color_code.required' => 'Vui lòng nhập mã màu sản phẩm!',
                'price_cl.required' => 'Vui lòng nhập giá màu sản phẩm! Nếu không có giá để là 0! ',
                'price_cl.numeric' => 'Giá màu sản phẩm phải là số!'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }else {
                $params = [];
                $params['cols'] = $request->post();
                
                unset($params['cols']['_token']);

                $model = new color();
                $res = $model->saveAddColor($params);
                if($res == null) {
                    Session::flash('error', 'Vui lòng nhập dữ liệu!');
                    return back();
                }
                else if ($res > 0) {
                    Session::flash('success', 'Thêm màu sản phẩm thành công!');
                    return back();
                }else {
                    Session::flash('error', 'Lỗi thêm mới!');
                    return back();
                }
            }
            
    }

    // lấy ra danh sách màu sản phẩm
    public function getListUpdate($id){
        $model = new color();
        $this->v['Product'] = product::all();
        $this->v['obj'] = $model->loadOne($id);

        return view('admin.product.color.update', $this->v);
    }

    public function Update($id, Request $request) {
        $rules = [
            'name' => 'required',
            'color_code' => 'required',
            'price_cl' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên màu sản phẩm!',
            'color_code.required' => 'Vui lòng nhập mã màu sản phẩm!',
            'price_cl.required' => 'Vui lòng nhập giá màu sản phẩm! Nếu không có giá để là 0! ',
            'price_cl.numeric' => 'Giá màu sản phẩm phải là số!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $method_route = 'product.color.update';
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            $model = new color();
            $obj = $model->loadOne($id);
            $params['cols']['id'] = $id;
            $res = $model->saveUpdateColor($params);
            if($res == null) {
                Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
                return Redirect()->route($method_route, ['id' => $id]);
            }
            if ($res == 1) {
                Session::flash('success', 'Cập nhật màu có id '.$obj->id .' thành công!');
                return Redirect()->route($method_route, ['id' => $id]);
            }else {
                Session::flash('error', 'Lỗi cập nhật!');
                return Redirect::to('/product');
            }
        }
    }

     // xóa màu sản phẩm
     public function delete($id){

        color::destroy($id);
        Session::flash('success', 'Xóa màu sản phẩm thành công!');
        return back();
        
    }

    public function ActiveStatusColor($id){
        DB::table('color')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusColor($id){
        DB::table('color')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }
}
