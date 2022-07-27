<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $modelCategory = new category();
        $res = $modelCategory->saveUpdateCate($params);
        if ($res > 0) {
            Session::flash('success', 'Cập nhật danh mục thành công!');
            return Redirect::to('/category');
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect::to('/category');
        }
    }

    // xóa danh mục
    public function delete($id){

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
}
