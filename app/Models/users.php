<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['id', 'name', 'email', 'password'];

    // public function loadList($param = []){
    //     $query = DB::table($this->table)
    //             ->select($this->fillable)
    //             ->where('id', '>', '150');
    //     $lists = $query->get();
    //     return $lists;
    // }

    // public function loadListWithPager($param = []){
    //     $query = DB::table($this->table)
    //            ->select($this->fillable);

    //     $lists = $query->paginate(5);
    //     return $lists;
    // }

    public function saveNew($params) {
        $data = array_merge($params['cols'], [
            'password' => Hash::make($params['cols']['password']),
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
