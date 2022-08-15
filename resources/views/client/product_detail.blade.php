@extends('client_layout.home_layout')
@section('content')
<div class="product-details-area pt-100px pb-100px">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" width="570px" height="663px" src="{{ $proDetail->image?''.Storage::url($proDetail->image):'' }}" alt="">
                            <a class="venobox full-preview" data-gall="myGallery" href="{{ $proDetail->image?''.Storage::url($proDetail->image):'' }}">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                        @if(isset($listImage))
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" width="570px" height="663px" src="{{ $listImage->image1?''.Storage::url($listImage->image1):'' }}" alt="">
                                <a class="venobox full-preview" data-gall="myGallery" href="{{ $listImage->image1?''.Storage::url($listImage->image1):'' }}">
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" width="570px" height="663px" src="{{ $listImage->image2?''.Storage::url($listImage->image2):'' }}" alt="">
                                <a class="venobox full-preview" data-gall="myGallery" href="{{ $listImage->image2?''.Storage::url($listImage->image2):'' }}">
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" width="570px" height="663px" src="{{ $listImage->image3?''.Storage::url($listImage->image3):'' }}" alt="">
                                <a class="venobox full-preview" data-gall="myGallery" href="{{ $listImage->image3?''.Storage::url($listImage->image3):'' }}">
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </a>
                            </div>
                        @else
                        @endif
                        
                    </div>
                </div>
                <div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img width="127px" height="127px" class="img-responsive m-auto" src="{{ $proDetail->image?''.Storage::url($proDetail->image):'' }}" alt="">
                        </div>
                        @if(isset($listImage))
                        <div class="swiper-slide">
                            <img width="127px" height="127px" class="img-responsive m-auto" src="{{ $listImage->image1?''.Storage::url($listImage->image1):'' }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img width="127px" height="127px" class="img-responsive m-auto" src="{{ $listImage->image2?''.Storage::url($listImage->image2):'' }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img width="127px" height="127px" class="img-responsive m-auto" src="{{ $listImage->image3?''.Storage::url($listImage->image3):'' }}" alt="">
                        </div>
                        @else
                        @endif
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content ml-25px">
                    <h2>{{$proDetail->name}}</h2>
                    <br>
                    <div class="pricing-meta">
                        <ul class="d-flex">
                            <li class="new-price">
                                
                                    @php
                                    $giamgia = 0;
                                    $tong = 0;
                                    $giamgia = $proDetail->price * $proDetail->discount / 100;
                                    $tong = $proDetail->price - $giamgia
                                    @endphp
                                    {{number_format($tong)}} VNĐ
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-rating-wrap">
                        Sản phẩm có màu: <br>
                        @foreach ($listColor as $color)
                        <div style="margin-left: 20px; cursor: pointer;" >
                            <div style="width: 50px; height: 50px; background: {{$color->color_code}}; text-align: center;"></div>
                            <div style=" margin-top: 10px">
                                {{$color->name}}
                            </div>
                            <div >
                                Giá: {{number_format($color->price_cl)}} VNĐ
                            </div>
                            <div>
                                Số lượng: {{$color->quantity}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="mt-30px"><strong>Mô tả sản phẩm</strong>: <br>{{$proDetail->desc}}</p>
                    
                    <span class="mt-30px"><strong>Số lượng</strong>: {{$proDetail->quantity}}</span>

                    <form id="contactForm1" action="{{route('addToCart', ['id' => $proDetail->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <select name="color" class="form-select" multiple aria-label="multiple select example">
                            <option disabled>Chọn màu</option>
                            @foreach($listColor as $color)
                            @if ($color->pro_id == $proDetail->id)
                            <option @php if($loop->iteration == 1){ echo "selected";} @endphp  value="{{$color->id}}">{{$color->name}}</option>
                            @else
                            @endif
                           
                            @endforeach
                          </select>
                          <br>
                          <select name="config" class="form-select" multiple aria-label="multiple select example">
                            <option disabled>Chọn cấu hình</option>
                            @foreach($listConfig as $config)
                            @if ($config->pro_id == $proDetail->id)
                            <option @php if($loop->iteration == 1){ echo "selected";} @endphp  value="{{$config->id}}">Cấu hình số: {{$loop->iteration}}</option>
                            @else
                            @endif
                           
                            @endforeach
                          </select>

                          <input type="hidden" name="price" value="{{$tong}}" >
                          <input type="hidden" name="id" value="{{$proDetail->id}}" >
                          <input type="hidden" name="name" value="{{$proDetail->name}}" >
                          <input type="hidden" name="image" value="{{$proDetail->image}}" >
    
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="quantity" value="1" min="1" max="{{$proDetail->quantity}}" />
                            </div>
                            
                            @if ($proDetail->quantity == 0)
                            <div class="pro-details-cart">
                                <a href="#" class="add-cart add_to_cart" >Add To Cart</a> *Hết hàng
                            </div>
                            @else
                            <div class="pro-details-cart">
                                {{-- <a onclick="addCart({{$proDetail->id}})" href="javascript:" class="add-cart add_to_cart" >Add To Cart</a> --}}
                                <button class="add-cart add_to_cart" type="submit">Add To Cart</button>
                            </div>
                            @endif
                    </form>
                        
                        
                    </div>
                </div>
                <!-- product details description area start -->
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav">
                        {{-- <button data-bs-toggle="tab" data-bs-target="#des-details2"></button> --}}
                        @foreach ($listConfig as $config)
                        @if($loop->iteration == 1)
                        <button class="active" data-bs-toggle="tab" data-bs-target="#des-details{{$loop->iteration}}">Cấu hình số {{$loop->iteration}}</button>
                        @else
                        <button data-bs-toggle="tab" data-bs-target="#des-details{{$loop->iteration}}">Cấu hình số {{$loop->iteration}}</button>
                        @endif
                        @endforeach
                        {{-- <button data-bs-toggle="tab" data-bs-target="#des-details3"></button> --}}
                    </div>
                    <div class="tab-content description-review-bottom">
                        
                        @foreach ($listConfig as $config)
                        <div id="des-details{{$loop->iteration}}" class="tab-pane @if($loop->iteration == 1) active @else @endif ">
                            <div class="product-description-wrapper">
                                <p>
                                    {{$config->config_product}}
                                </p>
                                <br>
                                <p>
                                    Cấu hình có giá: {{number_format($config->price_cf)}} VNĐ
                                    <br>
                                    Số lượng: {{$config->quantity}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- product details description area end -->
            </div>
        </div>
    </div>
</div>

<!-- Section Title & Tab Start -->
<div class="row">
    <div class="col-12">
        <div class="section-title text-center m-0">
            <h2 class="title">Sản phẩm liên quan</h2>
            <p>Những sản phẩm mà bạn có thể quan tâm!</p>
        </div>
    </div>
</div>
<br>
<!-- Section Title & Tab End -->
<!-- Product Area Start -->
<div class="product-area pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="row mb-n-30px">

                    @foreach ($listProCate as $pro)
                    @if($proDetail->id == $pro->id)
                    @else
                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                        <!-- Single Prodect -->
                        <div class="product">
                            <span class="badges">
                                @if($pro->discount > 0)
                                <span class="sale">-{{$pro->discount}}%</span>
                                @else
                                
                                @endif
                                <span class="new">New</span>
                            </span>
                            <div class="thumb">
                                <a href="{{route('proDetailPage', ['id' => $pro->id])}}" class="image">
                                    <img width="270px" height="274px" src="{{ $pro->image?''.Storage::url($pro->image):'' }}" alt="Product" />
                                    <img class="hover-image" src="{{ $pro->image?''.Storage::url($pro->image):'' }}" />
                                </a>
                            </div>
                            <div class="content">
                                @foreach ($getNameCate as $cate)
                                @if($cate->id == $pro->cate_id)
                                <span class="category"><a href="{{route('homePageCate', ['id' => $cate->id])}}">{{$cate->name}}</a></span>
                                @endif
                                @endforeach
                                <h5 class="title"><a href="{{route('proDetailPage', ['id' => $pro->id])}}">{{$pro->name}}
                                    </a>
                                </h5>
                                <span class="price">
                                    <span class="new">
                                        @php
                                        $giamgia = 0;
                                        $tong = 0;
                                        $giamgia = $pro->price * $pro->discount / 100;
                                        $tong = $pro->price - $giamgia
                                        @endphp
                                        {{number_format($tong)}} 
                                        VNĐ</span>
                                </span>
                            </div>
                            
                        </div>
                    </div>
                    @endif 
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->

<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>

<script>
    var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                RenderCart(data);
                alertify.success('Thêm vào giỏ hàng thành công!');
            },
            error: function (data) {
                alertify.error('Thất bại');
                console.log(data);
            },
        });
    });
    $("#cart-item").on("click", "#removeCart", function (){
        $.ajax({
            url: 'delete-to-cart/'+$(this).data('id'),
            type: 'GET',
            success: function (data) {
                RenderCart(data);
                alertify.success('Xóa giỏ hàng thành công!');
            },
            error: function (data) {
                alertify.error('Thất bại');
                console.log(data);
            },
        });
    });

    function RenderCart(data) {
        $("#cart-item").empty();
        $("#cart-item").html(data);
        $("#show-soluongCart").text($("#soluongCart").val());
    }
</script>

@endsection