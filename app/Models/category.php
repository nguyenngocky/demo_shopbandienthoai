<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['id', 'name', 'image', 'status', 'created_at', 'updated_at'];

    // Lấy dữ liệu ra bảng
    public function loadList($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->orderBy('id', 'desc');

        $lists = $query->paginate(5);
        return $lists;
    }

    // lấy tất cả danh mục sang sản phẩm
    public function getListPro($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->orderBy('id', 'desc');

        $lists = $query->get();
        return $lists;
    }
    // lưu tạo danh mục
    public function saveAddCate($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật danh mục
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật danh mục
    public function saveUpdateCate($params) {
        if(empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản cập nhật');
            return null;
        }
        $data = [];
        foreach($params['cols'] as $colName => $val) {
            if($colName == 'id') continue;
            if(in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
        ->where('id', '=', $params['cols']['id'])
        ->update($data);
        return $res;
    }

    // client

    // lấy ra danh sách ở thanh menu
    public function loadListClient($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('status', '=', '1')
               ->orderBy('id', 'desc');

        $lists = $query->get();
        return $lists;
    }

}
