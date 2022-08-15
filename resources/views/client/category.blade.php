@extends('client_layout.home_layout')
@section('content')
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <p class="compare-product"> <span>12</span> Product Found of <span>30</span></p>
                    <!-- Left Side End -->
                    <div class="shop-tab nav">
                        <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </button>
                        <button data-bs-target="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                    </div>
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <!-- Single Wedge End -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                <li><a class="dropdown-item" href="#">Sort By old</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge Start -->
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->
                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">
                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">

                                        @foreach ($listProCate as $pro)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                            <!-- Single Prodect -->
                                            <div class="product">
                                                <span class="badges">
                                                {{-- <span class="new">New</span> --}}
                                                </span>
                                                <div class="thumb">
                                                    <a href="{{route('proDetailPage', ['id' => $pro->id])}}" class="image">
                                                        <img width="270px" height="274px" src="{{ $pro->image?''.Storage::url($pro->image):'' }}" alt="Product" />
                                                        <img class="hover-image" src="{{ $pro->image?''.Storage::url($pro->image):'' }}" alt="Product" />
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
                                                <div class="actions">
                                                    <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart{{$pro->id}}"><i
                                                        class="pe-7s-shopbag"></i></button>
                                                    <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pro->id}}"><i class="pe-7s-look"></i></button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->
                    <!--  Pagination Area Start -->
           
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>

            <div class="col-lg-3 order-lg-first col-md-12 order-md-last">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Danh sách danh mục</h4>
                        <div class="sidebar-widget-category">
                            <ul>
                                @foreach ($getNameCate as $cate)
                                <li><a href="{{route('homePageCate', ['id' => $cate->id])}}" class=""> {{$cate->name}}
                                        <span></span> </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    {{-- <div class="sidebar-widget mt-8">
                        <h4 class="sidebar-title">Price Filter</h4>
                        <div class="price-filter">
                            <div class="price-slider-amount">
                                <input type="text" id="amount" class="p-0 h-auto lh-1" name="price" placeholder="Add Your Price">
                            </div>
                            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 20%; width: 60%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 20%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 80%;"></span></div>
                        </div>
                    </div> --}}
                    <!-- Sidebar single item -->
                    {{-- <div class="sidebar-widget">
                        <h4 class="sidebar-title">Color</h4>
                        <div class="sidebar-widget-color">
                            <ul class="d-flex flex-wrap">
                                <li><a href="#" class="color-1"></a></li>
                                <li><a href="#" class="color-2"></a></li>
                                <li><a href="#" class="color-3"></a></li>
                                <li><a href="#" class="color-4"></a></li>
                                <li><a href="#" class="color-5"></a></li>
                                <li><a href="#" class="color-6"></a></li>
                                <li><a href="#" class="color-7"></a></li>
                                <li><a href="#" class="color-8"></a></li>
                                <li><a href="#" class="color-9"></a></li>
                                <li><a href="#" class="color-10"></a></li>
                                <li><a href="#" class="color-11"></a></li>
                                <li><a href="#" class="color-12"></a></li>
                                <li><a href="#" class="color-13"></a></li>
                                <li><a href="#" class="color-14"></a></li>
                            </ul>
                        </div>
                    </div> --}}

                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection