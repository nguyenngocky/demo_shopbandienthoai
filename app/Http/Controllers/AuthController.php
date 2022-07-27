<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }
    public function getSignup(){

        return view('auth.signup');
    }

    public function postSignup(AuthRequest $request){
        
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelUser= new users();
            if($params['cols']['repassword'] != $params['cols']['password']){
                return Redirect::to('sign-up')->with('error', 'Mật khẩu nhập lại không khớp !')->withInput();
            }
            unset($params['cols']['repassword']);
            $res = $modelUser->saveNew($params);
            if ($res > 0) {
                Session::flash('success', 'Tạo tài khoản thành công. Đăng nhập ngay!');
                return Redirect::to('/sign-in')->withInput();
            }else {
                Session::flash('error', 'Lỗi thêm mới');
                return Redirect::to('/sign-up');
            }
        
    }

    public function getLogin(){

        return view('auth.signin');
    }

    public function postLogin(AuthRequest $request){

            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return Redirect::to('home-dashboard');
            }else{
                Session::flash('error','Email hoặc mật khẩu không đúng');
                return Redirect::to('sign-in');
            }
    }

    public function getLogOut(){
        Auth::logout();
        return Redirect::to('/sign-in');
    }
}
