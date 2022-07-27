<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['id', 'name', 'image', 'price','discount','desc','cate_id', 'status', 'created_at', 'updated_at'];

    public function category(){
        // belongsTo(Class cha, khóa ngoại của class con, khóa chính của class cha)
        return $this->belongsTo(category::class, 'cate_id', 'id');
    }
}
