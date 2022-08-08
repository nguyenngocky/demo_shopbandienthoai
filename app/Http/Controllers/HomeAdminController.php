<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{
    public function index(){
        
        if(!Auth::user()){
            return redirect()->to('sign-in');
        }
        if(Auth::user()->role_id != 1){
            return "Bạn không có quyền truy cập vào chức năng này";
        }
        // dd($_SESSION['admin']);
        // dd(Auth::user()->role_id);
        return view('admin.index');
    }
}
