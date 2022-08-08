<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    public function index() {
        $this->v['listCate'] = category::all();
        return view('client_layout.home', $this->v);
    }
}
