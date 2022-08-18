<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getList() {

        $Listbill = DB::table('bill')->get();

        return view('admin.cart.list', compact('Listbill'));
    }

    public function giaoHang($id) {
        DB::table('bill')->where('id', $id)->update(['trangthai' =>  1]);
        return back();
    }

    public function chiTietDon($id) {
        $ListProBill = DB::table('bill_detail')->where('bill_id', $id)->get();

        return view('admin.cart.bill_pro_detail', compact('ListProBill'));
    }
}
