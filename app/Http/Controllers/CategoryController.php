<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\category;
use App\Models\color;
use App\Models\config;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    // Đổ dữ liệu ra bảng
    public function getList(){
        $category = new category();
        $this->v['listCate'] = $category->loadList();

        return view('admin.category.list', $this->v);
        
    }

    // Thêm danh mục
    public function addCategory(CategoryRequest $request){
        
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            // up ảnh
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }

            $modelCategory = new category();
            $res = $modelCategory->saveAddCate($params);
            if ($res > 0) {
                Session::flash('success', 'Tạo danh mục thành công!');
                return Redirect::to('/category')->withInput();
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return Redirect::to('/category');
            }
    }

    // Lấy dữ liệu ra bảng cập nhật danh mục
    public function getListUpdate($id){
        $model = new category();
        $this->v['obj'] = $model->loadOne($id);

        return view('admin.category.update', $this->v);
    }
    // Cập nhật danh mục
    public function Update($id, CategoryRequest $request){
        $method_route = 'category.update';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $modelCategory = new category();
        $obj = $modelCategory->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $modelCategory->saveUpdateCate($params);
        if($res == null) {
            Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật danh mục '.$obj->name .' thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect::to('/category');
        }
    }

    // xóa danh mục
    public function delete($id){

        $pro = product::where('cate_id', $id)->first();
        config::where('pro_id', $pro->id)->delete();
        color::where('pro_id', $pro->id)->delete();
        $pro->delete();
        category::destroy($id);
        Session::flash('success', 'Xóa danh mục thành công!');
        return back();
        
    }

    public function ActiveStatus($id){
        DB::table('category')->where('id', $id)->update(['status' =>  1]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

    public function UnactiveStatus($id){
        DB::table('category')->where('id', $id)->update(['status' =>  0]);
        Session::flash('success', 'Cập nhật trạng thái thành công!');
        return back();
    }

     // up ảnh
     public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
