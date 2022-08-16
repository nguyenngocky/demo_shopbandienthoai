
@if(Session::has('cart') != null) 

<ul class="minicart-product-list">
    {{-- {{dd($newCart)}} --}}
    
    @foreach(Session::get('cart')->products as $item)
    <li>
        <a href="#" class="image"><img width="112px" height="114px" src="{{ $item['productInfo']['image']?''.Storage::url($item['productInfo']['image']):'http://placehold.it/100x100' }}" alt="Cart product Image"></a>
        <div id="cartView" class="content">
            <a href="#" class="title">{{$item['productInfo']['name']}}</a>
            <span class="quantity-price">{{$item['quantity']}} x <span class="amount">{{number_format($item['price'])}} VNĐ</span></span>
            <span>Giá cấu hình:  {{number_format($item['productInfo']['config_price'])}} VNĐ</span> <br>
            <span>Giá màu:  {{number_format($item['productInfo']['color_price'])}} VNĐ</span>
            {{-- <a href="#" class="remove">×</a> --}}
            <span style="cursor: pointer;" id="removeCart" data-url="{{route('deleteToCart', ['id' => $item['productInfo']['id'] ])}}"  class="remove">×</span>
        </div>
    </li>
    @endforeach
   <div> 
     <span><strong style="font-size: 25px; margin-right: 30px">Tổng:</strong> <span style="font-size: 20px; color: red">{{number_format(Session::get('cart')->totalPrice)}} VNĐ</span></span>
   </div>

   <input type="hidden" id="soluongCart" value="{{Session::get('cart')->totalQuantity}}">
   
</ul>
@else
Hãy mua gì đó !
<input id="soluongCart" type="hidden" value="0">
@endif
