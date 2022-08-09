<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\category;
use App\Models\config;
use App\Models\product;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    // lấy dữ liệu đổ ra trang chủ
    public function home() {
        $product = new product();
        $category = new category();
        $banner = new banner();
        $this->v['listProHome'] = $product->getListHome();
        $this->v['getNameCate'] = $category->loadListClient();
        $this->v['listBannerHome'] = $banner->loadListBannerHome();
        return view('client.home', $this->v);
    }

    // lấy sản phẩm ra theo danh mục
    public function proAsCategory($id) {
        $product = new product();
        $category = new category();
        $this->v['listProCate'] = $product->getListProAsCate($id);
        $this->v['getNameCate'] = $category->loadListClient();
        return view('client.category', $this->v);
    }

    // chi tiết sản phẩm
    public function proDetail($id) {
        $product = new product();
        $config = new config();
        $category = new category();
        
        $this->v['proDetail'] = $product->getProDetail($id);
        $this->v['listConfig'] = $config->getConfig($id);

        //sản phẩm liên quan
        $this->v['listProCate'] = $product->getListProAsCate($this->v['proDetail']->cate_id);
        $this->v['getNameCate'] = $category->loadListClient();

        return view('client.product_detail', $this->v);
    }
}
