@extends('client_layout.home_layout')
@section('content')
<div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
        <!-- OffCanvas Wishlist Start -->
        <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
            <div class="inner">
                <div class="head">
                    <span class="title">Wishlist</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Modern Smart Phone</a>
                                <span class="quantity-price">1 x <span class="amount">$21.86</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Bluetooth Headphone</a>
                                <span class="quantity-price">1 x <span class="amount">$13.28</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                        <li>
                            <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Smart Music Box</a>
                                <span class="quantity-price">1 x <span class="amount">$17.34</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons">
                        <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- OffCanvas Wishlist End -->
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
                                                {{$tong}} 
                                                VNĐ</span>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->
        <!-- Banner Area Start -->
        <div class="banner-area style-three pb-100px">
            <div class="container">
                <div class="row">
                    @foreach($listBannerHome as $banner)
                    <div class="col-md-6">
                        <div class="single-banner mb-lm-30px">
                            <img width="572px" height="542px" src="{{ $banner->image?''.Storage::url($banner->image):'' }}" alt="">
                            <div class="banner-content nth-child-3">
                                <h3 class="title"> {{$banner->title}} </h3>
                                <span style="color: white">{{$banner->desc}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        <!-- Feature product area start -->
        <div class="feature-product-area pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Featured Offers</h2>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="feature-product-slider swiper-container slider-nav-style-1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide feature-right-content">
                            <div class="image-side">
                                <img src="assets/images/feature-image/2.webp" alt="">
                                <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                    class="pe-7s-shopbag"></i></button>
                            </div>
                            <div class="content-side">
                                <div class="deal-timing">
                                    <span>End In:</span>
                                    <div data-countdown="2021/09/15"></div>
                                </div>
                                <div class="prize-content">
                                    <h5 class="title"><a href="single-product.html">Ladies Smart Watch</a></h5>
                                    <span class="price">
                                <span class="old">$48.50</span>
                                    <span class="new">$38.50</span>
                                    </span>
                                </div>
                                <div class="product-feature">
                                    <ul>
                                        <li>Predecessor : <span>None.</span></li>
                                        <li>Support Type : <span>Neutral.</span></li>
                                        <li>Cushioning : <span>High Energizing.</span></li>
                                        <li>Total Weight : <span> 300gm</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide feature-right-content">
                            <div class="image-side">
                                <img src="assets/images/feature-image/3.webp" alt="">
                                <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                    class="pe-7s-shopbag"></i></button>
                            </div>
                            <div class="content-side">
                                <div class="deal-timing">
                                    <span>End In:</span>
                                    <div data-countdown="2021/09/15"></div>
                                </div>
                                <div class="prize-content">
                                    <h5 class="title"><a href="single-product.html">Ladies Smart Watch</a></h5>
                                    <span class="price">
                                <span class="old">$48.50</span>
                                    <span class="new">$38.50</span>
                                    </span>
                                </div>
                                <div class="product-feature">
                                    <ul>
                                        <li>Predecessor : <span>None.</span></li>
                                        <li>Support Type : <span>Neutral.</span></li>
                                        <li>Cushioning : <span>High Energizing.</span></li>
                                        <li>Total Weight : <span> 300gm</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide feature-right-content">
                            <div class="image-side">
                                <img src="assets/images/feature-image/2.webp" alt="">
                                <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                    class="pe-7s-shopbag"></i></button>
                            </div>
                            <div class="content-side">
                                <div class="deal-timing">
                                    <span>End In:</span>
                                    <div data-countdown="2021/09/15"></div>
                                </div>
                                <div class="prize-content">
                                    <h5 class="title"><a href="single-product.html">Ladies Smart Watch</a></h5>
                                    <span class="price">
                                <span class="old">$48.50</span>
                                    <span class="new">$38.50</span>
                                    </span>
                                </div>
                                <div class="product-feature">
                                    <ul>
                                        <li>Predecessor : <span>None.</span></li>
                                        <li>Support Type : <span>Neutral.</span></li>
                                        <li>Cushioning : <span>High Energizing.</span></li>
                                        <li>Total Weight : <span> 300gm</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide feature-right-content">
                            <div class="image-side">
                                <img src="assets/images/feature-image/3.webp" alt="">
                                <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                    class="pe-7s-shopbag"></i></button>
                            </div>
                            <div class="content-side">
                                <div class="deal-timing">
                                    <span>End In:</span>
                                    <div data-countdown="2021/09/15"></div>
                                </div>
                                <div class="prize-content">
                                    <h5 class="title"><a href="single-product.html">Ladies Smart Watch</a></h5>
                                    <span class="price">
                                <span class="old">$48.50</span>
                                    <span class="new">$38.50</span>
                                    </span>
                                </div>
                                <div class="product-feature">
                                    <ul>
                                        <li>Predecessor : <span>None.</span></li>
                                        <li>Support Type : <span>Neutral.</span></li>
                                        <li>Cushioning : <span>High Energizing.</span></li>
                                        <li>Total Weight : <span> 300gm</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature product area End -->
        <!-- Fashion Area Start -->
        <div class="fashion-area" data-bg-image="assets/images/fashion/fashion-bg.webp">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="title"> <span>Smart Fashion</span> With Smart Devices </h2>
                        <a href="shop-left-sidebar.html" class="btn btn-primary text-capitalize m-auto">Shop All Devices</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fashion Area End -->
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
        <!-- Blog area start from here -->
        <div class="main-blog-area pb-100px">
            <div class="container">
                <!-- section title start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-30px0px">
                            <h2 class="title">Latest Blog</h2>
                            <p> There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <!-- section title start -->
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-xs-30px">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/1.webp" class="img-responsive w-100" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date line-height-1">
                                    <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i> 27,Jun 2030</span>
                                    <span><a class="blog-author" href="blog-grid.html"><i class="fa fa-user" aria-hidden="true"></i> Wild Nick</a></span>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">10 Quick Tips About Smart Product</a></h5>
                                <p>Lorem ipsum dolor sit amet consl adipisi elit, sed do eiusmod templ incididunt ut labore</p>
                                <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/2.webp" class="img-responsive w-100" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date line-height-1">
                                    <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i> 27,Jun 2030</span>
                                    <span><a class="blog-author" href="blog-grid.html"><i class="fa fa-user" aria-hidden="true"></i> Oaklee Odom</a></span>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">5 Real-Life Lessons About Smart Product</a></h5>
                                <p>Lorem ipsum dolor sit amet consl adipisi elit, sed do eiusmod templ incididunt ut labore</p>
                                <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
        </div>
        <!-- Blog area end here -->
@endsection