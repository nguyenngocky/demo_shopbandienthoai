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
                            <img class="img-responsive m-auto" width="570px" height="675px" src="{{ $proDetail->image?''.Storage::url($proDetail->image):'' }}" alt="">
                            <a class="venobox full-preview" data-gall="myGallery" href="{{ $proDetail->image?''.Storage::url($proDetail->image):'' }}">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/2.webp" alt="">
                            <a class="venobox full-preview" data-gall="myGallery" href="assets/images/product-image/zoom-image/2.webp">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/3.webp" alt="">
                            <a class="venobox full-preview" data-gall="myGallery" href="assets/images/product-image/zoom-image/3.webp">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{asset('assets/images/product-image/small-image/1.webp')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{asset('assets/images/product-image/small-image/2.webp')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{asset('assets/images/product-image/small-image/3.webp')}}" alt="">
                        </div>
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
                    <div class="pricing-meta">
                        <ul class="d-flex">
                            <li class="new-price">
                                
                                    @php
                                    $giamgia = 0;
                                    $tong = 0;
                                    $giamgia = $proDetail->price * $proDetail->discount / 100;
                                    $tong = $proDetail->price - $giamgia
                                    @endphp
                                    {{$tong}} VNĐ
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-rating-wrap">
                        
                        
                    </div>
                    <p class="mt-30px">{{$proDetail->desc}}</p>
                    
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                        </div>
                        <div class="pro-details-cart">
                            <button class="add-cart"> Add To
                                Cart</button>
                        </div>
                        
                    </div>
                </div>
                <!-- product details description area start -->
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav">
                        {{-- <button data-bs-toggle="tab" data-bs-target="#des-details2"></button> --}}
                        @foreach ($listConfig as $config)
                        <button data-bs-toggle="tab" data-bs-target="#des-details{{$loop->iteration}}">Cấu hình số {{$loop->iteration}}</button>
                        @endforeach
                        {{-- <button data-bs-toggle="tab" data-bs-target="#des-details3"></button> --}}
                    </div>
                    <div class="tab-content description-review-bottom">
                        
                        @foreach ($listConfig as $config)
                        <div id="des-details{{$loop->iteration}}" class="tab-pane">
                            <div class="product-description-wrapper">
                                <p>
                                    {{$config->config_product}}
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
<!-- Section Title & Tab End -->

<div class="row">
    <div class="col">
        <div class="new-product-slider swiper-container slider-nav-style-1">
            <div class="swiper-wrapper">

                @foreach ($listProCate as $lc)
                <div class="swiper-slide">
                    <!-- Single Prodect -->
                    <div class="product">
                        <span class="badges">
                        {{-- <span class="new">New</span> --}}
                        </span>
                        <div class="thumb">
                            <a href="{{route('proDetailPage', ['id' => $lc->id])}}" class="image">
                                <img width="270px" height="274px" src="{{ $lc->image?''.Storage::url($lc->image):'' }}" alt="Product" />
                                <img class="hover-image" src="{{ $lc->image?''.Storage::url($lc->image):'' }}" alt="Product" />
                            </a>
                        </div>
                        <div class="content">
                            @foreach ($getNameCate as $cate)
                            @if($cate->id == $proDetail->cate_id)
                            <span class="category"><a href="{{route('homePageCate', ['id' => $cate->id])}}">{{$cate->name}}</a></span>
                            @endif
                            @endforeach
                           
                            <h5 class="title"><a href="single-product.html">{{$lc->name}}
                                </a>
                            </h5>
                            <span class="price">
                                <span class="price">
                                    <span class="new">
                                        @php
                                        $giamgia = 0;
                                        $tong = 0;
                                        $giamgia = $lc->price * $lc->discount / 100;
                                        $tong = $lc->price - $giamgia
                                        @endphp
                                        {{$tong}} 
                                        VNĐ</span>
                                </span>
                            </span>
                        </div>
                        <div class="actions">
                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                class="pe-7s-shopbag"></i></button>
                            <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                            <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i
                                    class="pe-7s-refresh-2"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection