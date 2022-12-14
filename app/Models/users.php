<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['id', 'name', 'email', 'password', 'address', 'avatar', 'phone', 'role_id', 'status', 'created_at', 'updated_at'];


    public function loadList($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->orderBy('id', 'desc');

        $lists = $query->paginate(5);
        return $lists;
    }

    //  // lưu tạo user
     public function saveAddUser($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật user
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật user
    public function saveUpdateUser($params) {
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
        $data = array_merge($params['cols'], [
            'password' => Hash::make($params['cols']['password']),
        ]);
        $res = DB::table($this->table)
        ->where('id', '=', $params['cols']['id'])
        ->update($data);
        return $res;
    }

    // đăng ký
    public function saveNew($params) {
        $data = array_merge($params['cols'], [
            'password' => Hash::make($params['cols']['password']),
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
