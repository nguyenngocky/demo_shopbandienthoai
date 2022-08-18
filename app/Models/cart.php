<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cart extends Model
{
    use HasFactory;
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart) {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addCart($params, $id) {
        $product = $params;
        $newProduct = ['quantity' => 0, 'price' => 0, 'productInfo' => $product];
        
        if($this->products){
            if(array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }

        $newProduct['quantity'] += $product['quantity'];
        $newProduct['price'] += $product['price'];
        
        $this->products[$id] = $newProduct;
        $this->totalQuantity += $product['quantity'];
        $this->totalPrice += $product['price'];
    }

    public function deleteItemCart($id) {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

}
