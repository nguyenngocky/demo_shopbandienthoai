<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class banner_bottom extends Model
{
    use HasFactory;
    protected $table = 'banner_bottom';
    protected $fillable = ['id', 'title', 'desc', 'image', 'status', 'created_at', 'updated_at'];

    public function loadList($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->orderBy('id', 'desc');

        $lists = $query->paginate(5);
        return $lists;
    }

    //  // lưu tạo sản phẩm
     public function saveAddBannerB($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật sản phẩm
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật sản phẩm
    public function saveUpdateBannerB($params) {
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

    public function loadListBannerHome2() {
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('status', '1')
               ->orderBy('id', 'desc');

        $lists = $query->paginate(1);
        return $lists;
    }
}
