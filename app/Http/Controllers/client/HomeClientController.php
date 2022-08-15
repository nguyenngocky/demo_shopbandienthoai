<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\banner_bottom;
use App\Models\cart;
use App\Models\category;
use App\Models\color;
use App\Models\config;
use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

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
        $banner_2 = new banner_bottom();
        $this->v['listProHome'] = $product->getListHome();
        $this->v['listProHomeSale'] = $product->getListHomeSale();
        $this->v['listProHomeEye'] = $product->getListHomeEye();
        $this->v['getNameCate'] = $category->loadListClient();
        $this->v['listBannerHome'] = $banner->loadListBannerHome();
        $this->v['listBannerHome2'] = $banner_2->loadListBannerHome2();

        $this->v['getConfig'] = config::all();
        $this->v['getColor'] = color::all();
        
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
        $color = new color();
        $image = new image();
        
        $this->v['proDetail'] = $product->getProDetail($id);
        $this->v['listConfig'] = $config->getConfig($id);
        $this->v['listColor'] = $color->getColor($id);
        $this->v['listImage'] = $image->getImage($id);

        DB::table('product')->where('id', $id)->update(['view' =>  $this->v['proDetail']->view+1]);

        //sản phẩm liên quan
        $this->v['listProCate'] = $product->getListProAsCate($this->v['proDetail']->cate_id);
        $this->v['getNameCate'] = $category->loadListClient();

        return view('client.product_detail', $this->v);
    }

    public function addToCart(Request $request, $id) {
        $product = DB::table('product')->where('id', $id)->first();

        $params = [];
        $params = $request->post();
        unset($params['_token']);
        // dd($params);

        if($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new cart($oldCart);
            $newCart->addCart($params, $id);

            $request->Session()->put('cart', $newCart);
        }
        // dd($newCart);
      
        return view('client.cart-item');
    }

    public function deleteItemCart(Request $request, $id) {
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new cart($oldCart);
        $newCart->deleteItemCart($id);
        if(count($newCart->products) > 0){
            $request->Session()->put('cart', $newCart);
        }else {
            $request->Session()->forget('cart');
        }
        return view('client.cart-item');
        
    }
}
