<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = ['id', 'image1', 'image2', 'image3', 'pro_id', 'status', 'created_at', 'updated_at'];

    // Lấy dữ liệu ra bảng
    public function loadList($id,$param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('pro_id', $id)
               ->orderBy('id', 'desc');

        $lists = $query->paginate(7);
        return $lists;
    }

    // lưu tạo ảnh
    public function saveAddI($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật ảnh
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật ảnh
    public function saveUpdateI($params) {
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

    // lấy dữ liệu ra chi tiết sản phẩm theo id sản phẩm
    public function getImage($id) {
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('status', '=', '1')
               ->where('pro_id', '=', $id);

        $lists = $query->first();
        return $lists;
    }
}
