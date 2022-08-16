<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <form action="#">
        <div class="table-content table-responsive cart-table-content">
            <table>
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart') != null)
                    @foreach(Session::get('cart')->products as $item)
                    <tr>
                        <td class="product-thumbnail">
                            <a href="{{route('proDetailPage', ['id' => $item['productInfo']['id']])}}"><img class="img-responsive ml-15px" src="{{ $item['productInfo']['image']?''.Storage::url($item['productInfo']['image']):'http://placehold.it/100x100' }}" alt="" /></a>
                        </td>
                        <td class="product-name"><a href="{{route('proDetailPage', ['id' => $item['productInfo']['id']])}}">{{$item['productInfo']['name']}}</a></td>
                        <td class="product-price-cart"><span class="amount">{{number_format($item['productInfo']['price'])}}</span></td>
                        <td class="product-quantity">
                            <div class="">
                                <input style="width: 50px;" disabled class="" type="text" name="quantity" value="{{$item['quantity']}}" />
                            </div>
                        </td>
                        <td class="product-subtotal">{{number_format($item['price'])}}</td>
                        <td class="product-remove">
                            <a href="{{route('proDetailPage', ['id' => $item['productInfo']['id']])}}"><i class="fa fa-pencil"></i></a>
                            <span style="cursor: pointer;" id="removeCart" onclick="DeleteListItemCart({{$item['productInfo']['id']}})"  class="remove">×</span>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    Hãy tiếp tục mua sắm đi !
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update">
                        <a href="{{route('homePageClient')}}">Tiếp tục mua sắm</a>
                    </div>
                    <div class="cart-clear">
                        {{-- <button>Update Shopping Cart</button>
                        <a href="#">Clear Shopping Cart</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-lm-30px">
           
        </div>
        <div class="col-lg-4 col-md-6 mb-lm-30px">
            <div class="discount-code-wrapper">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gray">Mã giảm giá</h4>
                </div>
                <div class="discount-code">
                    <p>Nhập vào mã giảm giá ( nếu có ).</p>
                    <form action="#">
                        <input disabled type="text" required="" name="name" />
                        <button disabled class="cart-btn-2" type="submit">Apply Coupon</button>
                    </form>
                </div>
            </div>
        </div>
        @if(Session::has('cart') != null)
        <div class="col-lg-4 col-md-12 mt-md-30px">
            <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng số giỏ hàng</h4>
                </div>
                <h5>Số lượng <span>{{Session::get('cart')->totalQuantity}}</span></h5>
                <h5>Thành tiền <span>{{number_format(Session::get('cart')->totalPrice)}} VNĐ</span></h5>
                <div class="total-shipping">
                    <h5>Vận chuyển</h5>
                    <ul>
                        <li><input type="checkbox" checked /> Thanh toán khi nhận hàng <span>0 VNĐ</span></li>
                    </ul>
                </div>
                <h4 class="grand-totall-title">Tổng tiền <span>{{number_format(Session::get('cart')->totalPrice)}} VNĐ</span></h4>
                @if(!isset($objUserClient))
                *Vui lòng đăng nhập để tiến thanh toán
                @else
                <a href="#">Thanh toán</a>
                @endif
            </div>
        </div>
        @else
        <div class="col-lg-4 col-md-12 mt-md-30px">
            <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng số giỏ hàng</h4>
                </div>
                <h5>Số lượng <span>0</span></h5>
                <h5>Thành tiền <span>0 VNĐ</span></h5>
                <div class="total-shipping">
                    <h5>Vận chuyển</h5>
                    <ul>
                        <li><input type="checkbox" checked /> Thanh toán khi nhận hàng <span>0 VNĐ</span></li>
                    </ul>
                </div>
                <h4 class="grand-totall-title">Tổng tiền <span>0 VNĐ</span></h4>
                <a href="#">Thanh toán</a>
            </div>
        </div>
        @endif
    </div>
</div>