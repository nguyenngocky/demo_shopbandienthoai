<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }
    
    public function getList(){
        $model = new users();
        $this->v['role'] = role::all();
        $this->v['listUser'] = $model->loadList();
        return view('admin.user.list', $this->v);
    }

    // Thêm user
    public function addUser(Request $request){
        
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'address' => 'required',
                'avatar' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'phone' => 'required|numeric'
            ];
            $messages = [
                'name.required' => 'Vui lòng nhập tên!',
                'email.required' => 'Vui lòng nhập email!',
                'email.email' => 'Email phải đúng định dạng!',
                'email.unique' => 'Email đã tồn tại trong hệ thống!',
                'password.required' => 'Vui lòng nhập mật khẩu!',
                'address.required' => 'Vui lòng nhập địa chỉ!',
                'avatar.required' => 'Vui lòng nhập ảnh!',
                'avatar.mimes' => 'Ảnh phải thuộc định dạng: jpg,png,jpeg,gif,svg!',
                'phone.required' => 'Vui lòng nhập SĐT ',
                'phone.numeric' => 'SĐT phải là số!'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }else {
                $params = [];
                $params['cols'] = $request->post();

                if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                    $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
                }
                
                unset($params['cols']['_token']);

                $model = new users();
                $res = $model->saveAddUser($params);
                if($res == null) {
                    Session::flash('error', 'Vui lòng nhập dữ liệu!');
                    return Redirect::to('/user');
                }
                else if ($res > 0) {
                    Session::flash('success', 'Thêm thành công!');
                    return Redirect::to('/user');
                }else {
                    Session::flash('error', 'Lỗi thêm mới!');
                    return Redirect::to('/user');
                }
            }
    }

    // Lấy dữ liệu ra bảng cập nhật sản phẩm
    public function getListUpdate($id){
        $model = new users();
        $this->v['obj'] = $model->loadOne($id);
        $this->v['role'] = role::all();

        return view('admin.user.update', $this->v);
    }

    // Cập nhật sản phẩm
    public function Update($id, Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'address' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg,gif,svg',
            'phone' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email phải đúng định dạng!',
            'email.unique' => 'Email đã tồn tại trong hệ thống!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'avatar.mimes' => 'Ảnh phải thuộc định dạng: jpg,png,jpeg,gif,svg!',
            'phone.required' => 'Vui lòng nhập SĐT ',
            'phone.numeric' => 'SĐT phải là số!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $method_route = 'user.update';
            $params = [];
            $params['cols'] = $request->post();

            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }

            unset($params['cols']['_token']);
            $model = new users();
            $obj = $model->loadOne($id);
            $params['cols']['id'] = $id;
            $res = $model->saveUpdateUser($params);
            if($res == null) {
                Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
                return Redirect()->route($method_route, ['id' => $id]);
            }
            if ($res == 1) {
                Session::flash('success', 'Cập nhật người dùng có id '.$obj->id .' thành công!');
                return Redirect()->route($method_route, ['id' => $id]);
            }else {
                Session::flash('error', 'Lỗi cập nhật!');
                return Redirect::to('/product');
            }

        }
    }

    // xóa user
    public function delete($id){

        users::destroy($id);
        Session::flash('success', 'Xóa thành công!');
        return back();
        
    }

    public function ActiveStatusUser($id){
        DB::table('users')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatusUser($id){
        DB::table('users')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

     // up ảnh
     public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
