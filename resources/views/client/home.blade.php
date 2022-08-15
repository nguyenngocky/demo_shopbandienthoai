@extends('client_layout.home_layout')
@section('content')
<div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
        <!-- OffCanvas Cart Start -->
        <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
            <div class="inner">
                <div class="head">
                    <span class="title">Cart</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Modern Smart Phone</a>
                                <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Bluetooth Headphone</a>
                                <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Smart Music Box</a>
                                <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons mt-30px">
                        <a href="cart.html" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                        <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- OffCanvas Cart End -->
        <!-- OffCanvas Menu Start -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas-close"></button>
            <div class="user-panel">
                <ul>
                    <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>
                    <li><a href="my-account.html"><i class="fa fa-user"></i> Account</a></li>
                </ul>
            </div>
            <div class="inner customScroll">
                <div class="offcanvas-menu mb-4">
                    <ul>
                        <li><a href="#"><span class="menu-text">Home</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html"><span class="menu-text">Home 1</span></a></li>
                                <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li>
                            <a href="#"><span class="menu-text">Pages</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#"><span class="menu-text">Inner Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="order-tracking.html">Order Tracking</a></li>
                                        <li><a href="faq.html">Faq Page</a></li>
                                        <li><a href="coming-soon.html">Coming Soon Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="menu-text"> Other Shop Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.html">Cart Page</a></li>
                                        <li><a href="checkout.html">Checkout Page</a></li>
                                        <li><a href="compare.html">Compare Page</a></li>
                                        <li><a href="wishlist.html">Wishlist Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="menu-text">Related Shop Page</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="my-account.html">Account Page</a></li>
                                        <li><a href="login.html">Login & Register Page</a></li>
                                        <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                        <li><a href="thank-you-page.html">Thank You Page</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="menu-text">Shop</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#"><span class="menu-text">Shop Page</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                        <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                        </li>
                                        <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                        </li>
                                        <li><a href="cart.html">Cart Page</a></li>
                                        <li><a href="checkout.html">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="menu-text">product Details Page</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="single-product.html">Product Single</a></li>
                                        <li><a href="single-product-variable.html">Product Variable</a></li>
                                        <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                        <li><a href="single-product-group.html">Product Group</a></li>
                                        <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                        <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                        <li><a href="single-product-slider.html">Product Slider</a></li>
                                        <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="menu-text">Single Product Page</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="single-product-gallery-right.html">Product Gallery
                                                Right</a> </li>
                                        <li><a href="single-product-sticky-left.html">Product Sticky Left</a>
                                        </li>
                                        <li><a href="single-product-sticky-right.html">Product Sticky Right</a>
                                        </li>
                                        <li><a href="compare.html">Compare Page</a></li>
                                        <li><a href="wishlist.html">Wishlist Page</a></li>
                                        <li><a href="my-account.html">Account Page</a></li>
                                        <li><a href="login.html">Login & Register Page</a></li>
                                        <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="menu-text">Blog</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                                <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                                <li><a href="blog-list.html">Blog List Page</a></li>
                                <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Single Page</a></li>
                                <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- OffCanvas Menu End -->
                <div class="offcanvas-social mt-auto">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- OffCanvas Menu End -->
        <!-- Hero/Intro Slider Start -->
        <div class="section ">
            <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
                <!-- Hero slider Active -->
                <div class="swiper-wrapper">
                    <!-- Single slider item -->
                    {{-- <div class="hero-slide-item slider-height-2 swiper-slide bg-color1" data-bg-image="assets/images/hero/bg/hero-bg-2-1.webp">
                        <div class="container h-100">
                            <div class="row h-100 flex-row-reverse">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                    <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                        <h2 class="title-1">Easy Your Life <br>
                                        For Smart Device </h2>
                                        <span class="price">
                                            <span class="mini-title">Only</span>
                                        <span class="amount">$24.00</span>
                                        </span>
                                        <a href="shop-left-sidebar.html" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-center">
                                    <div class="show-case">
                                        <div class="hero-slide-image slider-2">
                                            <img src="assets/images/hero/inner-img/hero-2-1.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Single slider item -->
                    @foreach($listBannerHome as $banner)
                    <div class="hero-slide-item slider-height-2 swiper-slide bg-color1" width="100%" height="748px" data-bg-image="{{ $banner->image?''.Storage::url($banner->image):'' }}">
                        <div class="container h-100">
                            <div class="container h-100">
                                <div class="row h-100 flex-row-reverse">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                        <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                            <h2 class="title-1">{{$banner->title}} </h2>
                                            <span class="price">
                                                <span class="mini-title">{{$banner->desc}} </span>
                                            
                                            </span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-center">
                                        <div class="show-case">
                                            {{-- <div class="hero-slide-image slider-2">
                                                <img src="assets/images/hero/inner-img/hero-2-1.png" alt="" />
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-white"></div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <!-- Hero/Intro Slider End -->
        <br>
        <!-- Product Area Start -->
        <div class="product-area pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm mới</h2>
                            <p>Danh sách những sản phẩm mới nhất của hmart</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="row mb-n-30px">

                            @foreach ($listProHome as $pro)
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

                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->

        <!-- Product Area Start -->
        <div class="product-area pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm giảm giá</h2>
                            <p>Danh sách những sản phẩm đang giảm giá của hmart</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="row mb-n-30px">

                            @foreach ($listProHomeSale as $pro)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="sale">-{{$pro->discount}}%</span>
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
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->

         
        
        <!-- Fashion Area Start -->
        @foreach ($listBannerHome2 as $banner)
        <div class="fashion-area" data-bg-image="{{ $banner->image?''.Storage::url($banner->image):'' }}">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="title"> <span>{{$banner->desc}}</span> {{$banner->title}} </h2>
                   
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Fashion Area End -->
<br>
<br>
        <!-- Product Area Start -->
        <div class="product-area pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm có lượt xem nhiều nhất</h2>
                            <p>Danh sách những sản phẩm có lượt xem nhiều nhất của hmart</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="row mb-n-30px">

                            @foreach ($listProHomeEye as $pro)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="new">
                                            <svg version="1.1" witdh="20px" fill="white" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M609.608,315.426c3.19-5.874,3.19-12.979,0-18.853c-58.464-107.643-172.5-180.72-303.607-180.72
                                                        S60.857,188.931,2.393,296.573c-3.19,5.874-3.19,12.979,0,18.853C60.858,423.069,174.892,496.147,306,496.147
                                                        S551.143,423.069,609.608,315.426z M306,451.855c-80.554,0-145.855-65.302-145.855-145.855S225.446,160.144,306,160.144
                                                        S451.856,225.446,451.856,306S386.554,451.855,306,451.855z"/>
                                                    <path d="M306,231.67c-6.136,0-12.095,0.749-17.798,2.15c5.841,6.76,9.383,15.563,9.383,25.198c0,21.3-17.267,38.568-38.568,38.568
                                                        c-9.635,0-18.438-3.541-25.198-9.383c-1.401,5.703-2.15,11.662-2.15,17.798c0,41.052,33.279,74.33,74.33,74.33
                                                        s74.33-33.279,74.33-74.33S347.052,231.67,306,231.67z"/>
                                                </g>
                                            </g>

                                            </svg>
                                            {{$pro->view}}</span>
                                            @if($pro->discount > 0)
                                            <span class="sale">-{{$pro->discount}}%</span>
                                            @else
                                            
                                            @endif
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
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->

        <!-- Feature Area Srart -->
        <div class="feature-area pt-100px pb-100px">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="single-feture-col mb-md-30px mb-lm-30px">
                        <!-- single item -->
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="assets/images/icons/1.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Free Shipping</h4>
                                <span class="sub-title">Capped at $39 per order</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="single-feture-col mb-md-30px mb-lm-30px">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="assets/images/icons/2.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Card Payments</h4>
                                <span class="sub-title">12 Months Installments</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="single-feture-col">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="assets/images/icons/3.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Easy Returns</h4>
                                <span class="sub-title">Shop With Confidence</span>
                            </div>
                        </div>
                        <!-- single item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End -->
        
        
@endsection