<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $data = $params['cols'];
        $res = DB::table($this->table)
        ->where('id', '=', $data['id'])
        ->update($data);
        return $res;
    }
}
